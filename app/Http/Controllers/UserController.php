<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->hasRole('admin'), 403, 'Acceso denegado');

        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function downloadPdf()
    {
        abort_if(!auth()->user()->hasRole('admin'), 403, 'Acceso denegado');

        $users = User::latest()->get();
        $pdf = Pdf::loadView('admin.users.pdf', compact('users'));

        return $pdf->download('reporte_usuarios_murcia.pdf');
    }

    public function edit(User $user)
    {
        abort_if(!auth()->user()->hasRole('admin'), 403);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        abort_if(!auth()->user()->hasRole('admin'), 403);

        $request->validate([
            // Solo permitimos estas dos opciones
            'role' => 'required|string|in:admin,cliente'
        ]);

        if ($request->role === 'admin') {
            // Si elige admin, le damos el rol
            $user->syncRoles(['admin']);
        } else {
            // Si elige cliente, vaciamos sus roles (se queda como usuario base)
            $user->syncRoles([]);
        }

        return redirect()->route('admin.users.index')->with('status', 'Usuario actualizado con éxito');
    }

    public function destroy(User $user)
    {
        abort_if(!auth()->user()->hasRole('admin'), 403);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta de administrador.');
        }

        $user->delete();

        return back()->with('status', 'Usuario eliminado permanentemente.');
    }
}
