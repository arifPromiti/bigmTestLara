<html>
    <head>
        <title>BIGM test</title>

        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">

        <style>
            .form-group {
                padding: 3px;
            }

            .submit-btn{
                padding: 3px;
                text-align: center;
            }
        </style>
        
        <script src="{{ asset('assets/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>

        @yield('js')
    </head>
        
    </head>
    <body>
        <nav class="navbar" role="navigation" >
            <div><a type="button" class="btn btn-info" href="{{ url('/reg-form/') }}">Registration Form</a></div>
        </nav>
        @yield('content')
    </body>
</html>