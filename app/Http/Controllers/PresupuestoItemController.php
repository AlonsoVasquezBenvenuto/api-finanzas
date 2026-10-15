<?php
namespace App\Http\Controllers;

use App\Models\PresupuestoItem;
use App\Models\Presupuesto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PresupuestoItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(PresupuestoItem::query())->toJson();
        }
        return view('presupuesto-items.index');
    }

    public function create()
    {
        $presupuestos = Presupuesto::all();
        $categorias = Categoria::all();
        return view('presupuesto-items.create', compact('presupuestos', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_presupuesto' => 'required|exists:presupuestos,id_presupuesto',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'monto_asignado' => 'required|numeric',
            'monto_ejecutado' => 'required|numeric',
        ]);
        PresupuestoItem::create($request->all());
        return redirect()->route('presupuesto-items.index')->with('success', 'Ítem creado.');
    }

    public function edit(PresupuestoItem $presupuestoItem)
    {
        $presupuestos = Presupuesto::all();
        $categorias = Categoria::all();
        return view('presupuesto-items.edit', compact('presupuestoItem', 'presupuestos', 'categorias'));
    }

    public function update(Request $request, PresupuestoItem $presupuestoItem)
    {
        $request->validate([
            'id_presupuesto' => 'required|exists:presupuestos,id_presupuesto',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'monto_asignado' => 'required|numeric',
            'monto_ejecutado' => 'required|numeric',
        ]);
        $presupuestoItem->update($request->all());
        return redirect()->route('presupuesto-items.index')->with('success', 'Ítem actualizado.');
    }

    public function destroy(PresupuestoItem $presupuestoItem)
    {
        $presupuestoItem->delete();
        return response()->json(['success' => 'Ítem eliminado.']);
    }
}