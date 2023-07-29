<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Laravel Project</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
    $('#form').submit(function(e){
e.preventDefault();
var id = {{ $products->id }};
$.ajax({
    type: 'Post',
   url:'/update/'+id,
   data: $(this).serialize(),
   success: function (response) {
$('#id').val('');
$('#titulo').val('');
$('#imagenes').val('');
$('#precio').val('');
$('#descripcion').text('');

},
error: function (error) {
console.log(error);

}
})

    })




})



  </script>
<style type="text/css" rel="stylesheet">
.contenedor{
background-color:white;
-webkit-box-shadow:inset 4px 5px 10px 4px rgba(0,0,2,0.2);
box-shadow:inset 4px 5px 10px 4px rgba(0,0,2,0.2);


}

body{
background:#C9E8D9 !important;
margin:10px;
padding:5px;


}
input,label,button,textarea,h3{
margin:10px 0px 2px 40px !important;
padding:10px !important;



}
button{
margin-bottom:10px !important;
width:100%;


}
h3,label{
color:blue !important;
font-style:bold !important;


}
.form-control {
border: 1px solid blue !important;
border-radius: 4px !important;


}
</style>
</head>

<body>

@extends('layouts.app')

@section('content')
<div class="container contenedor">
<div class="row">
<div class="col-md-6">
<h3>Actualizar Datos</h3>
<form id="form" method="post">
@csrf
<div class="form-group">

<input type="hidden"   id="id" name="id" class="form-control" value="{{$products->id}}"/>

</div>
<div class="form-group">
<label>Titulo</label>
<input type="text"  id="titulo" name="titulo" class="form-control" value="{{$products->titulo}}"/>

</div>
<div class="form-group">
<label>Imagenes</label>
<input type="text"  id="imagenes" name="imagenes" class="form-control" value="{{$products->imagenes}}"/>

</div>
<div class="form-group">
<label>Precio</label>
<input type="text" id="precio" name="precio" class="form-control" value="{{$products->precio}}"/>


</div>
<div class="form-group">
<label>Descripcion</label>
<textarea col="10" row="10" id="descripcion"  class="form-control" name="descripcion" value="{{$products->descripcion}}"></textarea>

</div>

<button type="submit" class="btn btn-primary">Update</button>

</form>
</div>
</div>
</div>




@endsection

</body>
</html>
