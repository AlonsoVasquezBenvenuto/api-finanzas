<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Usuario::query())->toJson();
        }
        return view('usuarios.index');
    }

    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rol_id' => 'required|exists:rol,rol_id',
            'nombre' => 'required|string|max:150',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:8',
            'estado' => 'required|string|max:20',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        Usuario::create($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado.');
    }

    public function edit(Usuario $usuario)
    {
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'rol_id' => 'required|exists:rol,rol_id',
            'nombre' => 'required|string|max:150',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id_usuario . ',id_usuario',
            'estado' => 'required|string|max:20',
        ]);

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // No actualizar si está vacío
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(['success' => 'Usuario eliminado.']);
    }
}