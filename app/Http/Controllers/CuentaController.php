<?php
namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CuentaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Cuenta::query())->toJson();
        }
        return view('cuentas.index');
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('cuentas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'nombre' => 'required|string|max:150',
            'tipo' => 'required|string|max:30',
            'moneda' => 'required|string|max:3',
            'saldo_inicial' => 'required|numeric',
            'visibilidad' => 'required|string|max:20',
            'estado' => 'required|string|max:20',
        ]);

        $data = $request->all();
        $data['saldo_actual'] = $request->saldo_inicial; // El saldo actual inicia igual al inicial

        Cuenta::create($data);

        return redirect()->route('cuentas.index')->with('success', 'Cuenta creada.');
    }

    public function edit(Cuenta $cuenta)
    {
        $usuarios = Usuario::all();
        return view('cuentas.edit', compact('cuenta', 'usuarios'));
    }

    public function update(Request $request, Cuenta $cuenta)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'nombre' => 'required|string|max:150',
            'tipo' => 'required|string|max:30',
            'moneda' => 'required|string|max:3',
            'saldo_inicial' => 'required|numeric',
            'visibilidad' => 'required|string|max:20',
            'estado' => 'required|string|max:20',
        ]);

        $cuenta->update($request->all());

        return redirect()->route('cuentas.index')->with('success', 'Cuenta actualizada.');
    }

    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();
        return response()->json(['success' => 'Cuenta eliminada.']);
    }
}