<?php
namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HistorialController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Historial::query())->toJson();
        }
        return view('historiales.index');
    }
}