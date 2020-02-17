<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $file="C:/Users/desar/Desktop/Ficheros/prueba.txt";
      $texto="Esto es una prueba de creacion de php";
      $fp= fopen($file,"a+");
      fwrite($fp, $texto." "."prueba"."     "."viendo los espacios"."\n"."segunda linea si queda ya chingue"."\n");
      fclose($fp);
      $fp1= fopen($file,"a+");
      $cont=8;
      for ($i=0; $i <$cont ; $i++) {
      fwrite($fp1, $i."\n");
      }
      fclose($fp1);
      $fp2=fopen($file,"a+");
      fwrite($fp2, "ultimna linea y si queda te pasas a las empresas");
      fclose($fp2);
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
        //
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
