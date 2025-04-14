<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class AdminController extends Controller
{

    public function dashboard()
    {
        $totalReservations = Reservation::count();
        $plateauCount = Reservation::where('type_camion', 'Plateau')->count();
        $rideauCount = Reservation::where('type_camion', 'Rideau coulissant')->count();
        $latestReservations = Reservation::latest()->take(10)->get();

        return view('dashboard', compact('totalReservations', 'plateauCount', 'rideauCount', 'latestReservations'));
    }

    public function reservation()
    {
       

        return view('reservation');
    }
}
