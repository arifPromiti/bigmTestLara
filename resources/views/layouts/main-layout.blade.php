<!DOCTYPE html>
<html>
    <head>
        <title>BIGM test</title>

        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.css') }}">

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
        <script src="{{ asset('assets/datatables/datatables.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>

        @yield('js')

        <script>
            function logout(){
                $('#logout-form').submit();
            }
        </script>
    </head>

    </head>
    <body>
        <nav class="navbar" role="navigation" >
            <div><a type="button" class="btn btn-info" href="{{ url('/reg-form/') }}">Registration Form</a></div>
            <div align="right">
                @guest
                    <a type="button" class="btn btn-info" href="{{ route('login') }}">Login</a>
                @else
                    <a type="button" class="btn btn-danger" href="javascript:logout();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                </ul>
            </div>
        </nav>
        @yield('content')
    </body>
</html>
