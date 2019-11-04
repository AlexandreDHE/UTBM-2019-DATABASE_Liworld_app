@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @yield('entreprise')
        </div>

        <div class="col-md-8">
            @yield('typePoste')
        </div>

    </div>
</div>
@endsection
