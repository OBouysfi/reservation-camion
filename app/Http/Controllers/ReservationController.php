<?php

namespace App\Http\Controllers;

use App\Exports\ReservationsExport;
use App\Models\Reservation;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'chauffeur' => 'required|string|max:255',
            'numero_camion' => 'required|string|max:255',
            'type_camion' => 'required|string|in:Plateau,Rideau coulissant',
            'arrivee_prevue' => 'required|date',
        ]);

        // Create the reservation
        Reservation::create($validated);

        // Redirect or return success message
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
