<?php
namespace App\Http\Controllers;

use App\Models\Presupuesto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PresupuestoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Presupuesto::query())->toJson();
        }
        return view('presupuestos.index');
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('presupuestos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'nombre' => 'required|string|max:150',
            'monto_total' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|string|max:20',
            'visibilidad' => 'required|string|max:20',
        ]);
        Presupuesto::create($request->all());
        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto creado.');
    }

    public function edit(Presupuesto $presupuesto)
    {
        $usuarios = Usuario::all();
        return view('presupuestos.edit', compact('presupuesto', 'usuarios'));
    }

    public function update(Request $request, Presupuesto $presupuesto)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'nombre' => 'required|string|max:150',
            'monto_total' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|string|max:20',
            'visibilidad' => 'required|string|max:20',
        ]);
        $presupuesto->update($request->all());
        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto actualizado.');
    }

    public function destroy(Presupuesto $presupuesto)
    {
        $presupuesto->delete();
        return response()->json(['success' => 'Presupuesto eliminado.']);
    }
}