<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
class AdminController extends Controller
{

    public function dashboard()
    {
        $totalReservations = Reservation::count();
        $plateauCount = Reservation::where('type_camion', 'Plateau')->count();
        $rideauCount = Reservation::where('type_camion', 'Rideau coulissant')->count();
        $latestReservations = Reservation::latest()->take(10)->get();
        $totalUsers = User::count();

        return view('dashboard', compact('totalReservations', 'plateauCount', 'rideauCount', 'latestReservations'));
    }

    public function settings()
    {
        $authUser = auth()->user();
        return view('settings', compact('authUser'));
    }

    public function stats()
    {
        $totalReservations = Reservation::count();
        
        return view('dashboard', [
            'totalReservations' => $totalReservations
        ]);
    }
    public function admins()
    {
        $totalReservations = Reservation::count();
        $totalUsers = User::count();
        
        return view('dashboard', [
            'totalReservations' => $totalReservations,
            'totalUsers' => $totalUsers
        ]);
    }
    public function adminsRes()
    {
        $totalReservations = Reservation::count();
        $totalUsers = User::count();
        
        return view('profile.partials.update', [
            'totalReservations' => $totalReservations,
            'totalUsers' => $totalUsers
        ]);
    }
    
}
