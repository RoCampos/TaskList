<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task List</title>

        <!-- Custom fonts for this template-->
        <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    </head>
    <body class="bg-gradient-primary">

        <div class="container">

            <div class="row justify-content-center pt-5 mt-5">
                <h1 class="h1 text-gray-900">
                    Task List
                </h1>
            </div>

            <div class="row justify-content-center pt-5">
                <div class="col-sm-6">
                    <a class="btn btn-success btn-user btn-block" href="{{route('login')}}">Login</a>
                </div>

                <div class="col-sm-6">
                    <a class="btn btn-secondary btn-user btn-block" href="{{route('register')}}">Register</a>
                </div>
            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    </body>
</html>
