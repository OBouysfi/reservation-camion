<!-- resources/views/exports/reservations-pdf.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Liste des Réservations</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            line-height: 1.5;
        }

        .header {
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .header h1 {
            color: #F97317;
            font-size: 24px;
            margin: 0;
        }

        .header p {
            color: #777;
            font-size: 14px;
            margin: 5px 0 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            font-size: 12px;
            border-radius: 10px;

        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;


            background-color: #ddd text-align: left;
        }

        th {
            background-color: #F97317;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .page-number {
            text-align: right;
            font-size: 10px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Liste des Réservations</h1>
        <p>Généré le: {{ $date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Email</th>
                <th>Chauffeur</th>
                <th>Numéro Camion</th>
                <th>Type</th>
                <th>Arrivée Prévue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->name ?? 'N/A' }}</td>
                    <td>{{ $reservation->user->email ?? 'N/A' }}</td>
                    <td>{{ $reservation->chauffeur }}</td>
                    <td>{{ $reservation->numero_camion }}</td>
                    <td>{{ $reservation->type_camion }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($reservation->arrivee_prevue)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>



    <script type="text/php">
        if (isset($pdf)) {
            $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
            $font = $fontMetrics->get_font("DejaVu Sans", "normal");
            $size = 10;
            $color = array(0.5, 0.5, 0.5);
            $width = $fontMetrics->get_text_width($text, $font, $size);
            $x = $pdf->get_width() - $width - 15;
            $y = $pdf->get_height() - 25;
            $pdf->page_text($x, $y, $text, $font, $size, $color);
        }
    </script>
</body>

</html>
