<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id');

        foreach (range(1, 10) as $i) {
            DB::table('reservations')->insert([
                'user_id' => $users->random(),
                'chauffeur' => fake()->name(),
                'numero_camion' => strtoupper(\Illuminate\Support\Str::random(6)),
                'status' => collect(['En attente', 'Confirmée', 'Annulée'])->random(),
                'type_camion' => collect(['Plateau', 'Rideau coulissant'])->random(),
                'arrivee_prevue' => Carbon::now()->addDays(rand(1, 15)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
