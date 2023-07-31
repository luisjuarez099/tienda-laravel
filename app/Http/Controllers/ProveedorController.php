<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = DB::table('proveedores as p')
            ->select(
                'p.idproveedores',
                'p.razonsocial',
                'p.rfc',
                'p.tipopersona',
                'p.situacionFiscal',
                'p.activo',
                'p.calle',
                'p.numext',
                'p.numint',
                'cs.nombre as colonia',
                'cp.cp',
                'ms.nombre as municipio',
                'ps.nombre as pais',
                'es.nombre as estado'
            )
            ->join('colonia as cs', 'p.colonia', '=', 'cs.idcolonia')
            ->join('codigopostal as cp', 'p.cp', '=', 'cp.idcodigopostal')
            ->join('municipios as ms', 'p.municipio', '=', 'ms.idmunicipios')
            ->join('paises as ps', 'p.pais', '=', 'ps.idpaises')
            ->join('estados as es', 'p.estado', '=', 'es.idestados')
            ->whereNull('deleted_at')
            ->get();

        return view('proveedorc.index', compact('resultados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $codigoPostales = DB::select('SELECT cp.idcodigopostal, cp.cp FROM UNEDL_PIV_2023A.codigopostal cp');
        $colonias = DB::select('SELECT cl.idcolonia, cl.nombre FROM UNEDL_PIV_2023A.colonia cl');
        $municipios = DB::select('SELECT m.idmunicipios,m.nombre FROM UNEDL_PIV_2023A.municipios m');
        $paises = DB::select('SELECT p.idpaises, p.nombre FROM UNEDL_PIV_2023A.paises p');
        $estados = DB::select('SELECT e.idestados, e.nombre FROM UNEDL_PIV_2023A.estados e');
        return view('proveedorc.create', compact('codigoPostales', 'colonias', 'municipios', 'paises', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //crear la validacion de los inputs de cada fild de proveedor
        $request->validate([
            'razonsocial' => ['required','string','unique:proveedores,razonsocial','max:20'],
            'rfc' => ['required','max:13','uppercase','unique:proveedores,rfc','min:13','string'],
            'tipopersona' => ['required','boolean'],
            'situacionFiscal' => ['required','boolean'],
            'calle'=>['required','string'],
            'numext'=>['required','max:10'],
            'numint'=>['required','max:10'],
            'cp'=>['required','integer','min:5']
        ]);
        Proveedor::create($request->all());
        return redirect()->route('proveedor.index');
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
    public function edit(Proveedor $proveedor)
    {
        $paises = DB::select('SELECT p.idpaises, p.nombre FROM UNEDL_PIV_2023A.paises p');
        $estados = DB::select('SELECT e.idestados, e.nombre FROM UNEDL_PIV_2023A.estados e');

        return view('proveedorc.edit', ['proveedor' => $proveedor], compact('paises', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($request->all());
        return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedor.index');
    }


    public function trashedP()
    {
        $resultados = DB::table('proveedores as p')
            ->select(
                'p.idproveedores',
                'p.razonsocial',
                'p.rfc',
                'p.tipopersona',
                'p.situacionFiscal',
                'p.activo',
                'p.calle',
                'p.numext',
                'p.numint',
                'cs.nombre as colonia',
                'cp.cp',
                'ms.nombre as municipio',
                'ps.nombre as pais',
                'es.nombre as estado'
            )
            ->join('colonia as cs', 'p.colonia', '=', 'cs.idcolonia')
            ->join('codigopostal as cp', 'p.cp', '=', 'cp.idcodigopostal')
            ->join('municipios as ms', 'p.municipio', '=', 'ms.idmunicipios')
            ->join('paises as ps', 'p.pais', '=', 'ps.idpaises')
            ->join('estados as es', 'p.estado', '=', 'es.idestados')
            ->whereNotNull('deleted_at')
            ->get();

        $proveedores = Proveedor::onlyTrashed()->get();
        return view('proveedorc.trashed', compact('proveedores', 'resultados'));
    }

    public function restoreP($proveedor)
    {
        Proveedor::withTrashed()->find($proveedor)->restore();
        return redirect()->route('proveedor.index');
    }

    public function restoreAllP()
    {

        Proveedor::onlyTrashed()->restore();

        return redirect()->route('proveedor.index');
    }
}
