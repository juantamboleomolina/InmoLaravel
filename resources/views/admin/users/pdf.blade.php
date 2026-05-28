<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte de Usuarios</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .header { border-bottom: 2px solid #ea580c; padding-bottom: 10px; margin-bottom: 30px; }
        .title { font-size: 24px; font-weight: bold; margin: 0; }
        .subtitle { font-size: 12px; color: #666; margin-top: 5px; }
        table { w-full; border-collapse: collapse; margin-top: 20px; width: 100%; }
        th { background-color: #1e293b; color: white; padding: 10px; text-align: left; font-size: 12px; text-transform: uppercase; }
        td { padding: 10px; border-bottom: 1px solid #ddd; font-size: 14px; }
        .badge { padding: 4px 8px; font-size: 10px; font-weight: bold; border-radius: 4px; }
        .badge-admin { background-color: #f3e8ff; color: #6b21a8; }
        .badge-agente { background-color: #dbeafe; color: #1e40af; }
        .badge-cliente { background-color: #f0fdf4; color: #166534; }
    </style>
</head>
<body>

<div class="header">
    <h1 class="title">Murcia Real Estate</h1>
    <p class="subtitle">Reporte Oficial de Usuarios Registrados - {{ now()->format('d/m/Y') }}</p>
</div>

<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Registro</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if($user->hasRole('admin'))
                    <span class="badge badge-admin">ADMIN</span>
                @elseif($user->hasRole('agente') || $user->hasRole('agent'))
                    <span class="badge badge-agente">AGENTE</span>
                @else
                    <span class="badge badge-cliente">CLIENTE</span>
                @endif
            </td>
            <td>{{ $user->created_at->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
