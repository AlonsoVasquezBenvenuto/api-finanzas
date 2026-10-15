<?php
namespace App\Http\Controllers;
use App\Models\Auditoria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AuditoriaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Auditoria::query())->toJson();
        }
        return view('auditorias.index');
    }
}