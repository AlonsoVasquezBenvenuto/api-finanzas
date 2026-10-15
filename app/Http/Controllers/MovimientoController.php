<?php
namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Cuenta;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Presupuesto;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MovimientoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Movimiento::query())->toJson();
        }
        return view('movimientos.index');
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $cuentas = Cuenta::all();
        $categorias = Categoria::all();
        $presupuestos = Presupuesto::all();
        return view('movimientos.create', compact('usuarios', 'cuentas', 'categorias', 'presupuestos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_cuenta' => 'required|exists:cuentas,id_cuenta',
            'tipo' => 'required|string|max:20',
            'monto' => 'required|numeric|min:0.01',
            'fecha' => 'required|date',
            'estado' => 'required|string|max:20',
            'visibilidad' => 'required|string|max:20',
        ]);

        // Regla de negocio: Validar saldo si es EGRESO
        if ($request->tipo === 'EGRESO') {
            $cuenta = Cuenta::find($request->id_cuenta);
            if ($cuenta->saldo_actual < $request->monto) {
                return back()->withErrors(['monto' => 'Saldo insuficiente en la cuenta.'])->withInput();
            }
        }

        Movimiento::create($request->all());
        return redirect()->route('movimientos.index')->with('success', 'Movimiento registrado.');
    }

    public function edit(Movimiento $movimiento)
    {
        $usuarios = Usuario::all();
        $cuentas = Cuenta::all();
        $categorias = Categoria::all();
        $presupuestos = Presupuesto::all();
        return view('movimientos.edit', compact('movimiento', 'usuarios', 'cuentas', 'categorias', 'presupuestos'));
    }

    public function update(Request $request, Movimiento $movimiento)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_cuenta' => 'required|exists:cuentas,id_cuenta',
            'tipo' => 'required|string|max:20',
            'monto' => 'required|numeric|min:0.01',
            'fecha' => 'required|date',
            'estado' => 'required|string|max:20',
            'visibilidad' => 'required|string|max:20',
        ]);
        
        $movimiento->update($request->all());
        return redirect()->route('movimientos.index')->with('success', 'Movimiento actualizado.');
    }

    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();
        return response()->json(['success' => 'Movimiento eliminado.']);
    }
}