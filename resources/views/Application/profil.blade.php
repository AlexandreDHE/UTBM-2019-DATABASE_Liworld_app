@extends('layouts.app')

@section('content')
<main class="container mt-5" role="main">
  <div class="jumbotron">
    @if($userInfo[0] == $auth)
    <h1>Mon Profil</h1>
    @elseif($userInfo[0] != $auth)
      <h1>{{$userInfo[2]}} {{$userInfo[1]}}</h1>
      <br>
      
        <div class="card">
          <div class="card-body">

          <h3 class="text-center font-weight-bold blue-text mt-3 mb-4 pb-4"><strong>Veuillez évaluer le degré de proximité qui vous lie avec cette utilisateur </strong></h3>

          <form class="range-field my-5">
            <input type="range" class="form-control-range" id="formControlRange" min="0" max="10" step="0.5" value="0" require>
          </form>

          <!-- Grid row -->
          <div class="row">

          <!-- Grid column -->
          <div class="col-md-6 text-center pb-5">

          <h2><span class="badge blue lighten-2 mb-4">Nous ne nous connaissons pas </span></h2>
          <h2 class="display-4" style="color:red"><strong id="resellerEarnings">0/10</strong></h2>

        </div>
      <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 text-center pb-5">

          <h2><span class="badge blue lighten-2 mb-4">Nous nous connaissons très bien</span></h2>
          <h2 class="display-4" style="color:green"><strong id="clientPrice">10/10</strong></h2>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
  </div>

  <br>

  <button class="btn btn-lg btn-success" onclick="mettreUneNote();" type="submit">AJOUTER</button>
          
  
    @endif
  </div>
</main>
@endsection

