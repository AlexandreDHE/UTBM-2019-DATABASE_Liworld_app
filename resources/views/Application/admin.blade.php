@extends('layouts.app')

@section('content')
    <div class="nav-scroller bg-white shadow-sm">
    <nav class="nav nav-underline pt-2">
        <form class="form-inline mt-2 mt-md-0" method="GET" class="register-form" action="{{ route('typesContrats') }}">
            @csrf
            <button class="btn btn-link my-2 my-sm-0 ml-3" type="submit">Types de contrat </button>
        </form>
        
        <form class="form-inline mt-2 mt-md-0" method="GET" class="register-form" action="{{ route('domaines') }}">
            @csrf
            <button class="btn btn-link my-2 my-sm-0 ml-3" type="submit">Domaines d'activité</button>
        </form>

        <form class="form-inline mt-2 mt-md-0" method="GET" class="register-form" action="{{ route('entreprises') }}">
            @csrf
            <button class="btn btn-link my-2 my-sm-0 ml-3" type="submit">Entreprises </button>
        </form>
    </nav>
    </div>

    @yield('content')

@endsection