<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="TWGroup Project" />
        <meta name="author" content="Daniel Salazar" />
        <title>Registro al sistema</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
            border:1px solid #ccc;
        }
        </style>
    </head>

    <body>
        <div class="container box">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear nueva cuenta</h3></div>
                            <div class="card-body">
                                <form action="{{url('request-register')}}" method="POST" id="regForm">
									{{ csrf_field() }}
                                    <div class="form-group">
										<label class="small mb-1" for="inputFirstName">Nombre completo</label>
										<input class="form-control py-4" id="inputFirstName" type="text" name="name" placeholder="Ingrese su nombre completo" />
										@if ($errors->has('name'))
											<span class="error">{{ $errors->first('name') }}</span>
										@endif
									</div>
                                    <div class="form-group">
									    <label class="small mb-1" for="inputEmailAddress">Email</label>
										<input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Ingrese su correo electrónico" />
										@if ($errors->has('email'))
											<span class="error">{{ $errors->first('email') }}</span>
										@endif
									</div>
									<div class="form-group">
										<label class="small mb-1" for="inputPassword">Contraseña</label>
										<input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
										@if ($errors->has('password'))
											<span class="error">{{ $errors->first('password') }}</span>
										@endif
									</div>
                                    <div class="form-group mt-4 mb-0">
								        <button class="btn btn-primary btn-block" type="submit">Crear cuenta</button>
									</div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{url('login')}}">Ya tiene una cuenta? Ingrese</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
