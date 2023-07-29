
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Laravel Project</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">

function eliminar(id){
var id=id;
$.ajax({
    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
type:'DELETE',
url:"{{url('/eliminar')}}"+'/'+id,
   success: function (response) {

           console.log('eliminado exitoso');

                    },
                    error: function (error) {
                        console.log(error);

                    }

})
}
    </script>
<style type="text/css" rel="stylesheet">

a{
color:white!important;
text-decoration:none !important;

}
.btn-success{
margin:5px;
padding:5px;
width:100px;


}



</style>
</head>

<body>

@extends('layouts.app')

@section('content')
 <button class="btn btn-success"><a href="{{url('/create')}}">Create</a></button>
<table class="table table-hover  table-striped">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Imagenes</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Action</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($p as $fila)
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
    <button class="btn btn-primary">
    <a href="{{route('edit',$fila->id)}}">update</a></button>
     </td>
     <td>
   
        <button type="button"  class="btn btn-danger">
            <a href="javascript:void(0)" onclick="eliminar({{$fila->id}})">Delete</a>
        </button>
    

    </td>
    </tr>
  @endforeach
  </tbody>
</table>

         <div class="paginationWrapper">
            {{ $p->links() }}
         </div>




</div>
@endsection








</body>

</html>

