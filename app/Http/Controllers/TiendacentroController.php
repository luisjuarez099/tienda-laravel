<?php

namespace App\Http\Controllers;

use App\Models\Tiendacentro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiendacentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //meter el query para mostrar las tiendas del centro.
        $resultados = DB::table('tiendacentros as tc')
            ->select('tc.idtiendacentro', 'c.nombre')
            ->join('centro as c', 'tc.idtiendacentro', '=', 'c.idcentro')
            ->whereNull('tc.deleted_at')
            ->get();
        return view('tiendacentroc.index', compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiendacentroc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Aqui van los elementode de eliminar tinda centro
     */
    public function destroy(Tiendacentro $tiendacentro)
    {
        $tiendacentro->delete();
        return back();
    }
    public function restoreTC($tiendacentro)
    {

        Tiendacentro::withTrashed()->find($tiendacentro)->restore();
        return redirect()->route('tiendacentro.index');
    }
    public function trashedTC()
    {
        $resultados = DB::table('tiendacentros as tc')
            ->select('tc.idtiendacentro', 'c.nombre')
            ->join('centro as c', 'tc.idtiendacentro', '=', 'c.idcentro')
            ->whereNotNull('tc.deleted_at')
            ->get();
        $centros = Tiendacentro::onlyTrashed()->get();
        return view('tiendacentroc.trashed', compact('resultados', 'centros'));
    }
    public function restoreAllTC()
    {
        Tiendacentro::onlyTrashed()->restore();
        return redirect()->route('tiendacentro.index');
    }

}
