@extends('Layouts.layout')

@section('content')
<h1>Generar Layout</h1>
<form method="post" action="{{route('texto.store')}}" enctype="multipart/form-data" file="true">
  @csrf
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="">Sube el documento excel: </label>
    <input type="file" class="form-control" name="excel" accept="application/msexcel">
  </div>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
