<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LIWORLD') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'LIWORLD') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else

                        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                        <form class="form-inline mt-2 mt-md-0" method="GET" class="register-form" action="{{ route('showMyProfil') }}">
                            <button type="submit" class="btn btn-lg btn-dark">
                                {{Auth::user()->firstName }} {{ Auth::user()->name}} 
                            </button>
                        </form>
                                
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <ul class="navbar-nav mr-auto">

                                    <li class="nav-item active">
                            
                                        <a class="nav-link text-danger font-weight-bold h5" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                
                                    </li>

                                    <li class="nav-item active h5">
                                        <form class="form-inline mt-2 mt-md-0" method="GET" class="register-form" action="{{ route('home') }}">
                                            @csrf
                                            <button class="btn btn-outline-secondary my-2 my-sm-0 ml-3 mt-4" type="submit">Home</button>
                                        </form>
                                    </li>
                                    <li class="nav-item h5">
                                        <form class="form-inline mt-2 mt-md-0" method="GET" class="register-form" action="{{ route('homeAdmin') }}">
                                            @csrf
                                            <button class="btn btn-outline-dark my-2 my-sm-0 ml-3" type="submit">Administration du site</button>
                                        </form>
                                    </li>
                                </ul>
                                
                                <form class="form-inline mt-2 mt-md-0" method="POST" class="register-form" action="{{ route('searchProfil') }}">
                                    @csrf
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Trouver un utilisateur" required/>   
                                    <button class="btn btn-outline-warning my-2 my-sm-0 ml-3" type="submit">Search</button>
                                </form>
                            </div>
                        </nav>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
            @yield('content')
    </div>
</body>
</html>

<script>
 $(document).ready(function() {
    $( "#search" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: "{{url('autocomplete')}}",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    //console.log(obj.city_name);
                    return obj.name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
 
</script>   
