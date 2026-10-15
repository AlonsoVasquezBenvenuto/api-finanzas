<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriaController extends Controller
{
    /**
     * Listar categorías (Vista y DataTables)
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Categoria::query())->toJson();
        }
        return view('categorias.index');
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Guardar nueva categoría
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'tipo' => 'required|string|max:20',
            'visibilidad' => 'required|string|max:20',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Actualizar categoría
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'tipo' => 'required|string|max:20',
            'visibilidad' => 'required|string|max:20',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Eliminar categoría (Soft Delete)
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response()->json([
            'success' => 'Categoría eliminada exitosamente.'
        ]);
    }
}