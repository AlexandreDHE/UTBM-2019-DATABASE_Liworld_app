@extends('layouts.app')

@section('content')

<main class="container mt-5" role="main">
  <div class="container"> 

    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="row">
            <div class="col-sm">
            <div class="row">
                <h1 class="mx-auto d-block display-4">{{Auth::user()->firstName }} {{ Auth::user()->name}}</h1>
            </div>
            <div class="row pt-5">
                <img src="{{ asset('images/profil.png') }}" width="25%" class="mx-auto d-block" alt="Responsive image">
            </div>
            </div>
            <div class="col-sm">
            <img src="{{ asset('images/licard.png') }}" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">

        <div class="row">
            <div class="col-md-12">
            <div class="card mb-4 shadow-sm">

                <div class="row bg-dark rounded">
                    <div class="col-3">
                        <img src="{{ asset('images/exppro.png') }}" width="100%" class="mx-auto d-block" alt="Responsive image"> 
                    </div>
                    <div class="col-8">
                        <h1 class="pt-5 text-white "></b>Expériences professionnelles</b></h1>
                    </div>
                    <div class="col-1">

                        <form class="form-inline mt-2 mt-md-0" method="GET" class="register-form" action="{{ route('getFormExperiencePro') }}">
                            <button type="submit" class="mt-5 btn btn-outline-warning">New</button>
                        </form>

                    </div>
                </div>

                @for ($i = 0; $i < count($res)-1; $i++)
                <!-- EXPERIENCE   --> 
                <div class="card-body secondary">
                <div class="my-3 p-3 bg-white rounded shadow-sm ">
                    <div class="row bg-dark mb-2 rounded">
                    <h4 class="pl-3 pt-3 border-bottom border-gray pb-2 mb-0 text-white">{{$res[$i+1][1]}}</h4>
                    </div>

                    <div class="media text-muted pt-3">
                    <div class="row">
                        <div class="col-2">
                        <img src="{{ asset('images/iconephoto.png') }}" width="100%" class=" d-block" alt="Responsive image"> 
                        </div>
                        <div class="col-10">
                        <p style="font-size: 14px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                            <strong class="d-block text-dark">ADRESSE</strong>
                            {{$res[$i+1][6]}} {{$res[$i+1][7]}}<br>
                            {{$res[$i+1][9]}}<br>
                            {{$res[$i+1][8]}}
                        </p>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    
                    <div class="col-2">
                        <div class="media text-muted pt-3">
                        <p style="font-size: 14px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                            <strong class="d-block text-dark">Domaine:</strong>Sécurité - Militaire
                        </p>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="media text-muted pt-3">
                        <p style="font-size: 14px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                            <strong class="d-block text-dark">Contrat:</strong>{{$res[$i+1][0]}}
                        </p>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="media text-muted pt-3">
                        <p style="font-size: 14px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                            <strong class="d-block text-dark">Date de début:</strong>{{$res[$i+1][3]}}
                        </p>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="media text-muted pt-3">
                        <p style="font-size: 14px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                            <strong class="d-block text-dark">Date de fin:</strong>{{$res[$i+1][4]}}
                        </p>
                        </div>
                    </div>
                    
                    <div class="col-11 mx-auto  rounded mt-4">
                        <div class="row ">
                        <div class="col-sm">
                            <div style="background-color:#85aabd;" class="row rounded">
                            <h4 class="pl-2 pt-3 d-block text-dark "><b>Poste:</b> {{$res[$i+1][2]}}</h4>
                            </div>
                            <div class="row">
                            <p style="font-size: 16px;" class="pl-2 pt-3 d-block text-dark ">{{$res[$i+1][5]}}</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- FIN -->
                @endfor 
            </div>
        </div>
        </div> 
    </div>
    </div>

    <!-- --------------------------------------------------------------------------------------------------- -->
    
    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row ">
          <div class="col-md-12">
            <div class="card mb-4 shadow-sm">

              <div style="background-color:#eda628;" class=" p-2 row rounded">
                <div class="col-2">
                  <img src="{{ asset('images/formation.png') }}" width="100%" class="mx-auto d-block" alt="Responsive image"> 
                </div>
                <div class="col-9">
                  <h1 class="pt-5 text-dark "><b>Formations</b></h1>
                </div>
              </div>
              <div class="col-1">
                <form class="form-inline mt-2 mt-md-0" method="GET" class="register-form" action="{{ route('getFormFormation') }}">
                    <button type="submit" class="mt-5 btn btn-outline-dark">New</button>
                </form>
            </div>

        
            </div>
          </div>
        </div> 
      </div>
    </div>


</main>
@endsection