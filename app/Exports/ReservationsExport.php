<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReservationsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Reservation::with('user')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Chauffeur',
            'Numéro Camion',
            'Statut',
            'Type de Camion',
            'Arrivée Prévue',
            'Créé le'
        ];
    }

    /**
     * @param mixed $reservation
     * @return array
     */
    public function map($reservation): array
    {
        return [
            $reservation->id,
            $reservation->chauffeur,
            $reservation->numero_camion,
            $reservation->status,
            $reservation->type_camion,
            $reservation->arrivee_prevue,
            $reservation->created_at->format('d/m/Y H:i')
        ];
    }

    /**
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row (headings)
            1 => [
                'font' => ['bold' => true, 'size' => 12],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4A7FC1']
                ],
                'font' => ['color' => ['rgb' => 'FFFFFF']]
            ],
            // Auto-size columns
            'A' => ['width' => 5],
            'B' => ['width' => 20],
            'C' => ['width' => 30],
            'D' => ['width' => 20],
            'E' => ['width' => 15],
            'F' => ['width' => 20],
            'G' => ['width' => 15],
            'H' => ['width' => 15],
        ];
    }
}