<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Asimilable;
use Excel;
class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $empresa= Empresa::all();
   return view('datos', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $empresa= Empresa::all();
      return view('inicio', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Excel::load($request->excel, function($reader) {

          $excel = $reader->get();
      // iteracción
      $reader->each(function($row) {

          $asimilable = new Asimilable;
          $nom=$row->nombre_de_trabajador;
          $asimilable->nombre_empleado = str_pad($nom,55);
          $cadena= $row->cuenta;
          $cadena_tratada=str_replace('-', '', $cadena);
          $cadena_final=substr($cadena_tratada, 6,11);
          $asimilable->cuenta ="000000000".$cadena_final;
          $cadena1=$row->importe;
          $cadena_tratada1=str_replace('.', '', $cadena1);
          if(strlen($cadena_tratada1)==3 || strlen($cadena_tratada1)==4){
              $aux = str_pad($cadena_tratada1, 16, "0", STR_PAD_LEFT);
              $asimilable->importe=$aux."00";
          }
          if(strlen($cadena_tratada1)==5 || strlen($cadena_tratada1)==6)
          {
          $asimilable->importe = str_pad($cadena_tratada1, 18, "0", STR_PAD_LEFT);
          }

          $asimilable->save();
      });
      });
      return redirect()->action('ArchivoController@index');
    }


public function generartxt(Request $request){
  $asimilable= Asimilable::all();
       $empresa= Empresa::find($request->empresa);
       $cont= Asimilable::count();
       $empre= str_pad($empresa->nombre_empresa, 36);
       $abonos=str_pad($cont, 6, "0", STR_PAD_LEFT);
       $cadena1=$request->importe_total;
       $cadena_tratada1=str_replace('.', '', $cadena1);
       //////////////////////////////////////
       if(strlen($cadena_tratada1)==3 || strlen($cadena_tratada1)==4){
           $aux = str_pad($cadena_tratada1, 16, "0", STR_PAD_LEFT);
           $import=$aux."00";
       }
       if(strlen($cadena_tratada1)==5 || strlen($cadena_tratada1)==6)
       {
       $import = str_pad($cadena_tratada1, 18, "0", STR_PAD_LEFT);
       }
       //////////////////////////////////////
        $file="C:/Users/Incretec Desarrollo/Desktop/Ficheros/prueba.txt";
        $fp= fopen($file,"wr");
        fwrite($fp, "1".$empresa->numero_cliente.$request->fecha_pago.$request->serial.$empre."PAGO DE NOMINA"."      "."05"."                                        "."C00"."\n");
        fclose($fp);
        $fp0=fopen($file, "a+");
        fwrite($fp0, "2"."1"."001".$import."01".$empresa->numero_sucursal.$empresa->numero_cuenta."                    "."\n");
        fclose($fp0);
        $fp1= fopen($file,"a+");
        for ($i=0; $i <$cont ; $i++) {
        fwrite($fp1, "3"."0"."001".$asimilable[$i]->importe."01".$asimilable[$i]->cuenta.$request->referencia."                              ".$asimilable[$i]->nombre_empleado.'Nomina'."                                 "."                         "."0000000000000"."\n");
        }
        fclose($fp1);
        $fp2=fopen($file,"a+");
        fwrite($fp2, "4"."001".$abonos.$import."000001".$import);
        fclose($fp2);
        return redirect()->action('ArchivoController@create');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
