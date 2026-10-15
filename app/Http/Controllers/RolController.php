<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RolController extends Controller
{
    /**
     * Listar roles (Vista y DataTables)
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Rol::query())->toJson();
        }
        return view('roles.index');
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Guardar nuevo rol
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:rol,nombre',
            'description' => 'required|string',
        ]);

        Rol::create($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Mostrar un rol específico (no usado en este CRUD)
     */
    public function show(Rol $rol)
    {
        return redirect()->route('roles.index');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Rol $rol)
    {
        return view('roles.edit', compact('rol'));
    }

    /**
     * Actualizar rol
     */
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:rol,nombre,' . $rol->rol_id . ',rol_id',
            'description' => 'required|string',
        ]);

        $rol->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rol actualizado exitosamente.');
    }

    /**
     * Eliminar rol (Soft Delete)
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();

        return response()->json([
            'success' => 'Rol eliminado exitosamente.'
        ]);
    }
}