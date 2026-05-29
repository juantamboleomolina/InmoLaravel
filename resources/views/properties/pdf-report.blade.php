<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; margin: 0; padding: 0; }
        .header { border-bottom: 2px solid #ea580c; padding-bottom: 10px; margin-bottom: 25px; }
        .title { font-size: 24px; font-weight: bold; margin: 0; color: #0f172a; }
        .subtitle { font-size: 11px; color: #64748b; margin-top: 5px; text-transform: uppercase; letter-spacing: 1px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #0f172a; color: white; padding: 12px; text-align: left; font-size: 11px; text-transform: uppercase; }
        td { padding: 12px; border-bottom: 1px solid #e2e8f0; font-size: 13px; vertical-align: middle; }
        tr:nth-child(even) td { background-color: #f8fafc; }

        .price { font-weight: bold; font-size: 14px; color: #ea580c; }
        .specs { font-size: 11px; color: #64748b; }
        .ref { font-size: 10px; color: #94a3b8; }
    </style>
</head>
<body>

<div class="header">
    <h1 class="title">Murcia Real Estate</h1>
    <p class="subtitle">{{ $title }} - Generado el {{ now()->format('d/m/Y') }}</p>
</div>

<table>
    <thead>
    <tr>
        <th style="width: 40%">Propiedad</th>
        <th style="width: 25%">Zona</th>
        <th style="width: 20%">Detalles</th>
        <th style="width: 15%">Precio</th>
    </tr>
    </thead>
    <tbody>
    @foreach($properties as $property)
        <tr>
            <td>
                <strong>{{ $property->title }}</strong><br>
                <span class="ref">Ref: #MUR-{{ str_pad($property->id, 4, '0', STR_PAD_LEFT) }}</span>
            </td>
            <td>{{ $property->location }}</td>
            <td class="specs">
                {{ $property->rooms }} Hab <br>
                {{ $property->bathrooms }} Baños <br>
                {{ $property->area }} m²
            </td>
            <td class="price">{{ number_format($property->price, 0, ',', '.') }} €</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
