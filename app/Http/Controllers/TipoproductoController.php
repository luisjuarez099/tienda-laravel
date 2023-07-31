<?php

namespace App\Http\Controllers;

use App\Models\Tiendacentro;
use App\Models\Tipoproducto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TipoproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados=DB::select('SELECT tp.idtipodeproducto, tp.tipo FROM tipodeproducto tp where tp.deleted_at IS NULL');
        // $resultados = DB::table('tipodeproducto')->Paginate(5);
        return view('tipoproductosc.index',compact('resultados'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('tipoproductosc.create');
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'tipo'=>['required','string','unique:tipodeproducto,tipo']
        ]);

        Tipoproducto::create($request->all());
        return redirect()->route('tipoproducto.index');
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
    public function edit(Tipoproducto $tipoproducto):View
    {
        $tipos=DB::select('SELECT tp.idtipodeproducto, tp.tipo FROM tipodeproducto tp WHERE tp.deleted_at IS NULL');
        return view('tipoproductosc.edit',['tipoproducto'=>$tipoproducto],compact('tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipoproducto $tipoproducto)
    {
        $request->validate([
            'tipo'=>['required','string','max:20']
        ]);
        $tipoproducto->update($request->all());
        return redirect()->route('tipoproducto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipoproducto $tipoproducto)
    {
        $tipoproducto->delete();
        return back();
    }

    public function restoreTP($tipoproducto){
        Tipoproducto::withTrashed()->find($tipoproducto)->restore();
        return redirect()->route('tipoproducto.index');
    }

    public function trashedTP(){
        $resultados=DB::select('SELECT tp.idtipodeproducto, tp.tipo FROM tipodeproducto tp WHERE tp.deleted_at IS NOT NULL');
        $tipos=Tipoproducto::onlyTrashed()->get();
        return view('tipoproductosc.trashed',compact('resultados','tipos'));
    }

    public function restoreAllTP(){
        Tipoproducto::onlyTrashed()->get();
        return redirect()->route('tipoproducto.index');
    }

}
