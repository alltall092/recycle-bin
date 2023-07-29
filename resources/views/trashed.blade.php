@extends('layouts.app')

@section('content')
 <button class="btn btn-success">Create</button>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Imagenes</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($trash as $fila)
    <tr>
    <td>
    {{$fila->id}}
    
    </td>
    <td>
    {{$fila->titulo}}
    
    </td>
    <td>
    {{$fila->imagenes}}
    
    </td>
    <td>
    {{$fila->precio}}
    
    </td>

  <td>
    {{$fila->descripcion}}
    
    </td>
    <td>
    <button class="btn btn-primary">update</button>
    <form method="POST" action="{{ url('/restore') }}" onsubmit="return confirm('Are you sure you want to delete this user ?');">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $fila->id }}" required>
        <button type="submit" class="btn btn-danger">
            Restore
        </button>
    </form>
    
    </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection