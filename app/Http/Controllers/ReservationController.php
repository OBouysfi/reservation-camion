<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                    return '<a href="' . route('reservations.show', $row->id) . '" class="btn btn-info btn-sm">View</a>';
                })->setRowClass('text-center align-middle text-sm text-gray-300 whitespace-nowrap') 
                ->rawColumns(['action']) 

                ->make(true);
        }

        return view('reservation');
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
        //
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
            'numero_camion' => 'required|string|max:255',
            'type_camion' => 'required|in:Plateau,Rideau coulissant',
            'arrivee_prevue' => 'required|date',
        ]);

        DB::table('users')->update([
            'name' => $request->name,
        ]);

        $reservation->update([
            $validated['']
        ]);

        return redirect()->back()->with('success', 'Réservation mise à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
