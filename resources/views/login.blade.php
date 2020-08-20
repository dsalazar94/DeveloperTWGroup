<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ingresar al sistema</title>
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
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Ingresar</h3></div>
                            <div class="card-body">
                                <form action="{{url('request-login')}}" method="POST" id="logForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Correo electrónico</label>
                                        <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Ingresar correo electrónico" />
                                        @if ($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Contraseña</label>
                                        <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Ingresar contraseña" />
                                        @if ($errors->has('password'))
                                            <span class="error">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" type="submit">Ingresar</button>
                                    </div>
                                </form>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{url('register')}}">No tiene cuenta? Registrese!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
