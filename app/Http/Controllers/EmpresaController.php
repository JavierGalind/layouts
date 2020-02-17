<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empresas= Empresa::all();
        return view('empresas', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $empresa= new Empresa;
        $empresa->nombre_empresa=$request->nombre_empresa;
        $empresa->numero_cuenta=$request->numero_cuenta;
        $empresa->numero_cliente=$request->numero_cliente;
        $empresa->numero_sucursal=$request->numero_sucursal;
        $empresa->save();
        return redirect()->action('EmpresaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $empresa= Empresa::find($id);
        $empresa->nombre_empresa=$request->nombre_empresa;
        $empresa->numero_cuenta=$request->numero_cuenta;
        $empresa->numero_cliente=$request->numero_cliente;
        $empresa->numero_sucursal=$request->numero_sucursal;
        $empresa->save();
        return redirect()->action('EmpresaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empresa = Empresa::whereid($id)->firstOrFail();
          $empresa->delete();
        return redirect()->action('EmpresaController@index');
    }
}
