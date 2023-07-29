
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Laravel Project</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
            $('#form').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url:"{{ route('store') }}",
                    data: $(this).serialize(),
                    success: function (response) {

                        $('#titulo').val('');
                        $('#imagenes').val('');
                        $('#precio').val('');
                        $('#descripcion').text('');

                    },
                    error: function (error) {
                        console.log(error);

                    }
                });
            });
        });


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
    color:green !important;
    font-style:bold !important;


    }
    .form-control {
    border: 1px solid green !important;
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
<h3>Insertar Datos</h3>

<form  id="form"  method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label>Titulo</label>
<input type="text"  id="titulo" name="titulo" class="form-control" value=""/>

</div>
<div class="form-group">
<label>Imagenes</label>
<input type="text"  id="imagenes" name="imagenes" class="form-control" value=""/>

</div>
<div class="form-group">
<label>Precio</label>
<input type="text"  id="precio" name="precio" class="form-control" value=""/>


</div>
<div class="form-group">
<label>Descripcion</label>
<textarea col="10" row="10"  id="descripcion" class="form-control" name="descripcion"></textarea>

</div>

<button type="submit" class="btn btn-success">Create</button>

</form>
</div>
</div>
</div>


@endsection

</body>
</html>