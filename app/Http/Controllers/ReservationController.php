<?php

namespace App\Http\Controllers;

use App\Exports\ReservationsExport;
use App\Mail\NotifyAdminOfSubmissionMail;
use App\Mail\SendUserConfirmationMail;
use App\Models\Reservation;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Reservation::with('user')->select('reservations.*');

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    return view('reservation', compact('id'))->render();
                })
                ->addColumn('action',fn($data)=>view('Popup',['user'=>$data])->render())
                ->setRowClass('text-center align-middle text-sm text-black whitespace-nowrap')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('reservation');
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


        $reservation = Reservation::create($validated);




        $data = [
            'name' => $validated['chauffeur'],
            'email' => $validated['email'],
            'message' => 'Votre réservation a été créée avec succès.',
            'chauffeur' => $validated['chauffeur'],
            'numero_camion' => $validated['numero_camion'],
            'type_camion' => $validated['type_camion'],
            'arrivee_prevue' => $validated['arrivee_prevue'],
        ];

        

        Mail::to($validated['email'])->send(new SendUserConfirmationMail($data));
        Mail::to('hia807976@gmail.com')->send(new NotifyAdminOfSubmissionMail($data));


        return redirect()->back()->with('success', 'Réservation créée avec succès !');
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
            'email' => 'required|email',
            'chauffeur' => 'required|string|max:255',
            'numero_camion' => 'required|string|max:255',
            'type_camion' => 'required|in:Plateau,Rideau coulissant',
            'arrivee_prevue' => 'required|date',
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

        return redirect()->back()->with('success', 'Réservation supprimée avec succès.');
    }
}
