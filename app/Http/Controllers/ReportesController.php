<?php
namespace App\Http\Controllers;

use App\Models\Reportes;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReportesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Reportes::query())->toJson();
        }
        return view('reportes.index');
    }
}