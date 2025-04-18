<?php

namespace App\Http\Controllers;

use App\Exports\ReservationsExport;
use App\Mail\NotifyAdminOfSubmissionMail;
use App\Mail\ReservationConfirmedMail;
use App\Mail\SendUserConfirmationMail;
use App\Models\Reservation;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Log;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Yajra\DataTables\DataTables;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = Reservation::with('user')->select('reservations.*');


            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }
            if ($request->filled('arrivee_prevue')) {
                $query->whereDate('arrivee_prevue', '=', date('Y-m-d', strtotime($request->arrivee_prevue)));
            }
            return DataTables::of($query)
                ->addColumn('action', function ($reservation) {
                    return view('profile.partials.update', compact('reservation'))->render();
                })
                ->setRowClass('text-center align-middle text-sm text-black whitespace-nowrap')
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('reservation');
    }

    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $request->status;
        $reservation->save();

        // Only send email if status is "Confirmée" and we actually have an email
        if ($reservation->status === 'Confirmée' && $reservation->email) {
            try {
                Mail::to($reservation->email)
                    ->send(new ReservationConfirmedMail($reservation));

                // Optionally, for Laravel ≤8 you could check:
                // if (! empty(Mail::failures())) { throw new \Exception('Mail failures: '.implode(',', Mail::failures())); }

            } catch (TransportExceptionInterface $e) {
                // This catches any low‑level transport error (SMTP down, auth failed, etc)


                return response()->json([
                    'message' => 'Status updated, but email sending failed.',
                    'error' => $e->getMessage(),
                ], 500);
            } catch (\Exception $e) {
                // Catch any other errors (template errors, queue failures, etc)


                return response()->json([
                    'message' => 'Status updated, but email sending encountered an error.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }

        return response()->json(['message' => 'Status updated successfully'], 200);
    }




    public function exportPdf()
    {
        $reservations = Reservation::with('user')->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('exports.reservations-pdf', [
            'reservations' => $reservations,
            'date' => date('Y-m-d H:i:s')
        ]);

        return $pdf->download('reservations-' . date('Y-m-d') . '.pdf');
    }


    public function exportExcel()
    {
        return Excel::download(new ReservationsExport, 'reservations-' . date('Y-m-d') . '.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function resnolog(Request $request)
    {
        $validated = $request->validate([
            'chauffeur' => 'required|string|max:255',
            'email' => 'required|email',
            'numero_camion' => 'required|string|max:255',
            'type_camion' => 'required|string|in:Plateau,Rideau coulissant',
            'arrivee_prevue' => 'required|date',
        ]);


        Reservation::create([
            'email' => $validated['email'],
            'chauffeur' => $validated['chauffeur'],
            'numero_camion' => $validated['numero_camion'],
            'type_camion' => $validated['type_camion'],
            'arrivee_prevue' => $validated['arrivee_prevue'],
        ]);




        $data = [
            'name' => $validated['chauffeur'],
            'email' => $validated['email'],
            'message' => 'Votre réservation a été créée avec succès.',
            'chauffeur' => $validated['chauffeur'],
            'numero_camion' => $validated['numero_camion'],
            'type_camion' => $validated['type_camion'],
            'arrivee_prevue' => $validated['arrivee_prevue'],
        ];

        // Log::info('Data to be sent: ', $data);
        // Log::info('Email to be sent: ', $validated['email']);


        Mail::to($validated['email'])->send(new SendUserConfirmationMail($data));
        Mail::to('hia807976@gmail.com')->send(new NotifyAdminOfSubmissionMail($data));

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Réservation créée avec succès.',
            ]);
        }

        return redirect()->back()->with('success', 'Réservation créée avec succès!');
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'chauffeur' => 'required|string|max:255',
            'numero_camion' => 'required|string|max:255',
            'type_camion' => 'required|string|in:Plateau,Rideau coulissant',
            'arrivee_prevue' => 'required|date',
        ]);


        $reservation = Reservation::create($validated);


        $user = User::findOrFail($validated['user_id']);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'message' => 'Votre réservation a été créée avec succès.',
            'chauffeur' => $validated['chauffeur'],
            'numero_camion' => $validated['numero_camion'],
            'type_camion' => $validated['type_camion'],
            'arrivee_prevue' => $validated['arrivee_prevue'],
        ];


        Mail::to($user->email)->send(new SendUserConfirmationMail($data));
        Mail::to('hia807976@gmail.com')->send(new NotifyAdminOfSubmissionMail($data));
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Réservation créée avec succès.'
            ]);
        }

        return redirect()->back()->with('success', 'Réservation créée avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'user_id' => 'exists:users, id',
            'email' => 'nullable|required|email',
            'chauffeur' => 'nullable|string|max:255',
            'numero_camion' => 'nullable|required|string|max:255',
            'type_camion' => 'nullable|required|in:Plateau,Rideau coulissant',
            'arrivee_prevue' => 'nullable|required|date',
        ]);

        $reservation->update($validated);

        return redirect()->back()->with('success', 'Réservation mise à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', "Réservation supprimée avec succès.");

       
    }



    public function exportSelectedPdf(Request $request)
    {
        // Validate that we have some IDs
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:reservations,id'
        ]);

        // Get only the selected reservations
        $reservations = Reservation::with('user')
            ->whereIn('id', $request->ids)
            ->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('exports.reservations-pdf', [
            'reservations' => $reservations,
            'date' => date('Y-m-d H:i:s'),
            'isSelected' => true // Optional flag to indicate these are selected items
        ]);

        return $pdf->download('selected-reservations-' . date('Y-m-d') . '.pdf');
    }
}
