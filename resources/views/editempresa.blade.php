<div class="modal fade" id="modal-update-{{$emp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('empresas.update',$emp->id)}}" enctype="multipart/form-data" file="true">
        @method('PUT')
        @csrf
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Nombre de la Empresa</label>
            <input type="text" class="form-control" name="nombre_empresa" value="{{$emp->nombre_empresa}}">
          </div>
          <div class="form-group col-md-4">
            <label for="">Numero de cuenta: </label>
            <input type="text" class="form-control" name="numero_cuenta" value="{{$emp->numero_cuenta}}">
          </div>
          <div class="form-group col-md-4">
            <label for="">Numero de Sucursal</label>
            <input type="text" class="form-control" name="numero_sucursal" value="{{$emp->numero_sucursal}}">
          </div>
          <div class="form-group col-md-2">
            <label for="">Numero de cliente</label>
            <input type="double" class="form-control" name="numero_cliente" value="{{$emp->numero_cliente}}">
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
