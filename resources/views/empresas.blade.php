@extends('Layouts.layout')

@section('content')
  <h1>Empresas</h1>
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   Nueva Empresa
 </button>
 <br><br>

 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-12">
           <table class="table" id="example1">
           <thead class="thead-dark">
             <tr>
               <th scope="col">Nombre Empresa</th>
               <th scope="col">Numero de cuenta</th>
               <th scope="col">FNumero de cliente</th>
               <th scope="col">Numero de sucursal</th>
               <th scope="col">Opciones</th>
             </tr>
           </thead>
           <tbody>
             @foreach ($empresas as $emp)
               <tr>
                 <th scope="row">{{$emp->nombre_empresa}}</th>
                 <td>{{$emp->numero_cuenta}}</td>
                 <td>{{$emp->numero_cliente}}</td>
                 <td>{{$emp->numero_sucursal}}</td>
                 <td width="15%">
                     <a href="{{route('empresas.edit',$emp->id)}}" class="btn btn-info"><i class="far fa-edit"></i></a>
                     <form method="post" action="{!! action('EmpresaController@destroy', $emp->id) !!}" class="pull-left">
                  @csrf
                  @method('DELETE')
                    <div>
                     <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                     </div>
                   </form>
                   </td>
               </tr>
             @endforeach
           </tbody>
         </table>
         </div>
     </div>
 </div>


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form method="post" action="{{route('empresas.store')}}" enctype="multipart/form-data" file="true">
           @csrf
         <div class="form-row">
           <div class="form-group col-md-4">
             <label for="">Nombre de la Empresa</label>
             <input type="text" class="form-control" name="nombre_empresa" placeholder="Ingresa el nombre de la empresa">
           </div>
           <div class="form-group col-md-4">
             <label for="">Numero de cuenta: </label>
             <input type="text" class="form-control" name="numero_cuenta" placeholder="Ingresa el numero de cuenta">
           </div>
           <div class="form-group col-md-4">
             <label for="">Numero de Sucursal</label>
             <input type="text" class="form-control" name="numero_sucursal" placeholder="Ingresa el numero de sucursal">
           </div>
           <div class="form-group col-md-2">
             <label for="">Numero de cliente</label>
             <input type="double" class="form-control" name="numero_cliente" placeholder="Ingresa el numero de cliente">
           </div>
         <button type="submit" class="btn btn-primary">Guardar</button>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </form>
       </div>
       <div class="modal-footer">

       </div>
     </div>
   </div>

 </div>
@endsection
