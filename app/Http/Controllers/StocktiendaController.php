<?php

namespace App\Http\Controllers;

use App\Models\Stocktienda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StocktiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = DB::table('stocktiendas as stc')
            ->select('stc.idstocktienda', 'ctp.nombre as producto', 'c.nombre as centro', 'cantidad', 'promocion', 'mespromocion')
            ->join('catalogoproductos as ctp', 'stc.producto', '=', 'ctp.catalogoproducto')
            ->join('tiendacentros as tc', 'stc.tiendacentro', '=', 'tc.centro')
            ->join('centro as c', 'tc.centro', '=', 'c.idcentro')
            ->whereNull('stc.deleted_at')
            ->get();
        return view('stocktiendac.index', compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $productos=DB::select('SELECT ctp.catalogoproducto, ctp.nombre as producto FROM UNEDL_PIV_2023A.catalogoproductos ctp  WHERE ctp.deleted_at IS NULL');
        $centros=DB::select('SELECT c.idcentro, c.nombre as centro FROM UNEDL_PIV_2023A.centro c');
        return view('stocktiendac.create',compact('productos','centros'));
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'cantidad' => ['required', 'integer', 'uppercase', 'numeric' ],
            'promocion' => ['required', 'boolean', 'numeric'],
            'mespromocion' => ['required', 'boolean', 'numeric']
        ]);
        Stocktienda::create($request->all());
        return redirect()->route('stock.index');
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
    public function edit(Stocktienda $stock):View
    {
        $productos=DB::select('SELECT ctp.catalogoproducto, ctp.nombre as producto FROM UNEDL_PIV_2023A.catalogoproductos ctp  WHERE ctp.deleted_at IS NULL');
        $centros=DB::select('SELECT c.idcentro, c.nombre as centro FROM UNEDL_PIV_2023A.centro c');

        return view('stocktiendac.edit', ['stock'=>$stock], compact('productos', 'centros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stocktienda $stock)
    {
        $stock->update($request->all());
        return redirect()->route('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stocktienda $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index');
    }

    public function restoreS($stocktienda){
        Stocktienda::withTrashed()->find($stocktienda)->restore();
        return redirect()->route('stock.index');
    }

    public function trashedS(){
        $resultados = DB::table('stocktiendas as stc')
            ->select('stc.idstocktienda', 'ctp.nombre as producto', 'c.nombre as centro', 'cantidad', 'promocion', 'mespromocion')
            ->join('catalogoproductos as ctp', 'stc.producto', '=', 'ctp.catalogoproducto')
            ->join('tiendacentros as tc', 'stc.tiendacentro', '=', 'tc.centro')
            ->join('centro as c', 'tc.centro', '=', 'c.idcentro')
            ->whereNotNull('stc.deleted_at')
            ->get();
        $stocks=Stocktienda::onlyTrashed()->get();
        return view('stocktiendac.trashed', compact('resultados', 'stocks'));

    }

    public function restoreallS(){
        Stocktienda::onlyTrashed()->restore();
        return redirect()->route('stock.index');
    }
}
