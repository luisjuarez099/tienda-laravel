<?php

namespace App\Http\Controllers;

use App\Models\Catalogo; //hace referencia al modelo (tabla en la BD)
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CatalogoController extends Controller
{
    //retorna la vista en home
    public function home()
    {
        return view('welcome');
    }

    /**
     * depliega la informacion que traemos desde el query
    */
    public function index()
    {
        //query para catalogos
        $resultados=DB::table('catalogoproductos as ctp')
        ->select('ctp.catalogoproducto', 'ctp.nombre', 'ctp.descripcion', 'ctp.costo', 'ctp.precio', 'pv.razonsocial', 'tp.tipo')
        ->join('proveedores as pv', 'ctp.proveedor', '=', 'pv.idproveedores')
        ->join('tipodeproducto as tp', 'ctp.tipoproducto', '=', 'tp.idtipodeproducto')
        ->whereNull('ctp.deleted_at')
        ->get();
        // $resultados=DB::table('catalogoproductos')->paginate(5);
        return view('catalogoc.index',compact('resultados'));
    }

    /*
     * Semuestra el formukario para la nueva creacion
    */
    public function create()
    {
        // creamos consulta para atraer a los proveedores

        $proveedores=DB::select('SELECT pv.idproveedores, pv.razonsocial FROM UNEDL_PIV_2023A.proveedores pv WHERE pv.deleted_at IS NULL');
        $tipoproductos=DB::select('SELECT tp.idtipodeproducto, tp.tipo FROM UNEDL_PIV_2023A.tipodeproducto tp WHERE tp.deleted_at IS NULL');
        return view('catalogoc.create',compact('proveedores','tipoproductos'));
    }

    /**
     * Aqui es donde se inserta en la tabla de BD
    */
    public function store(Request $request):RedirectResponse
    {
        //creamos validacion por cada input de nuestro formulario
        $request->validate([
            'nombre'=>['bail','required','min:5','unique:catalogoproductos,nombre','string'],
            'descripcion'=>['required','min:10','string'],
            'costo'=>['required','integer','size:4'],
            'precio'=>['required','integer','size:4']
        ]);

        Catalogo::create($request->all());
        return redirect()->route('catalogo.index');
    }

    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        //
    }

    /**
     * Aqui se muestra el formulario de donde se muestra la edicion
     */
    public function edit(Catalogo $catalogo):View
    {

        $proveedores=DB::select('SELECT pv.idProveedores, pv.razonsocial FROM UNEDL_PIV_2023A.proveedores pv WHERE pv.deleted_at IS NULL');
        $tipoproductos=DB::select('SELECT tp.idtipodeproducto, tp.tipo FROM UNEDL_PIV_2023A.tipodeproducto tp WHERE tp.deleted_at IS NULL');

        return view('catalogoc.edit',['catalogo'=>$catalogo],compact('proveedores','tipoproductos'));
    }

    /**
     * Esta es la funcion donde se actualiza el formulario
     */
    public function update(Request $request, Catalogo $catalogo)
    {
        $catalogo->update($request->all());
        return redirect()->route('catalogo.index')->with('success','Se ha actualizado correctamente');
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Catalogo $catalogo)
    {
        $catalogo->delete();
        return back();
    }

    public function restore($catalogo){
        Catalogo::withTrashed()->find($catalogo)->restore();
        return redirect()->route('catalogo.index');
    }
    public function trashed(){
        //traemos la informacion como se hizo en el index
        $resultados=DB::table('catalogoproductos as ctp')
            ->join('proveedores as pv', 'ctp.proveedor', '=', 'pv.idproveedores')
            ->join('tipodeproducto as tp', 'ctp.tipoproducto', '=', 'tp.idtipodeproducto')
            ->select('ctp.catalogoproducto', 'ctp.nombre', 'ctp.descripcion', 'ctp.costo', 'ctp.precio', 'pv.razonsocial', 'tp.tipo')
            ->whereNotNull('ctp.deleted_at')
            ->get();
        $catalogos=Catalogo::onlyTrashed()->get();
        return view('catalogoc.trashed',compact('catalogos','resultados'));
    }


    public function restoreAll(){

        Catalogo::onlyTrashed()->restore();
        return redirect()->route('catalogo.index');
    }
}
