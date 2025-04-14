@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-6">Dashboard Admin 🚛</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg">
                <h5 class="text-xl font-bold">Total Réservations</h5>
                <h3 class="text-3xl">{{ $totalReservations }}</h3>
            </div>
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                <h5 class="text-xl font-bold">Plateau</h5>
                <h3 class="text-3xl">{{ $plateauCount }}</h3>
            </div>
            <div class="bg-yellow-500 text-gray-800 p-6 rounded-lg shadow-lg">
                <h5 class="text-xl font-bold">Rideau coulissant</h5>
                <h3 class="text-3xl">{{ $rideauCount }}</h3>
            </div>
        </div>

        <h4 class="text-xl font-semibold mb-4">Dernières réservations :</h4>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2 border-b">Chauffeur</th>
                        <th class="px-4 py-2 border-b">Camion</th>
                        <th class="px-4 py-2 border-b">Type</th>
                        <th class="px-4 py-2 border-b">Date Arrivée</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestReservations as $res)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $res->chauffeur }}</td>
                            <td class="px-4 py-2">{{ $res->numero_camion }}</td>
                            <td class="px-4 py-2">{{ $res->type_camion }}</td>
                            <td class="px-4 py-2">{{ $res->arrivee_prevue }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <canvas id="chartReservations"></canvas>

            <script>
                const ctx = document.getElementById('chartReservations');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Total', 'Plateau', 'Rideau coulissant'],
                        datasets: [{
                            label: 'Réservations',
                            data: [{{ $totalReservations }}, {{ $plateauCount }}, {{ $rideauCount }}],
                            backgroundColor: ['#007bff', '#28a745', '#ffc107']
                        }]
                    }
                });
            </script>
        </div>
    </div>
@endsection
