<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Nuevo comentario</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">Nuevo comentario</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto"> </ul>
                <span>
                    <a class="my-2 my-lg-0" href="{{url('principal')}}">Atrás |</a>
                    <a class="my-2 my-lg-0" href="{{url('logout')}}">| Cerrar sesión</a>
                </span>
            </div>
        </nav>

        <div class="card-body">
            <form action="{{url('request-newComment')}}" method="POST" id="regForm">
				{{ csrf_field() }}
                <div class="form-group" style="display:none">
					<input class="form-control py-4" id="inputTitle" type="text" name="user_id" value={{ Auth::user()->id }} />
				</div>
                <div class="form-group" style="display:none">
					<input class="form-control py-4" id="inputTitle" type="text" name="publication_id" value={{ $id_publication }} />
				</div>
                <div class="form-group">
				    <label class="small mb-1" for="inputContenido">Contenido</label>
					<input class="form-control py-4" id="inputContenido"  name="content" placeholder="Ingrese el contenido" />
					@if ($errors->has('content'))
						<span class="error">{{ $errors->first('content') }}</span>
					@endif
				</div>
                <div class="form-group" style="display:none">
					<input class="form-control py-4" id="inputTitle" type="text" name="status" value=0 />
				</div>
				<div class="form-group mt-4 mb-0">
					<button class="btn btn-primary btn-block" type="submit">Ingresar comentario</button>
				</div>
            </form>
            </div>
        </div>

    </body>
</html>
