@extends('layouts.app')

@section('content')
<main class="container mt-5" role="main">
  <div class="jumbotron">

    @if($userInfo[0] == $auth)
      <h1>Mon Profil</h1>
    @else
      <h1>{{$userInfo[2]}} {{$userInfo[1]}}</h1>
      <br>  
  </div>

      <br>

      @if($connecte == -1 )

        <div class="card">
          <div class="card-body">
            <h3 class="text-center font-weight-bold blue-text mt-3 mb-4 pb-4"><strong>Veuillez évaluer le degré de proximité qui vous lie avec cette utilisateur </strong></h3>
    <form class="range-field my-5" action="{{ route('ajouterUneConnexion') }}">
              <input type="hidden" name="id_user2" value={{$userInfo[0]}} />
              <input type="range" class="form-control-range" id="note" name="note" min="0" max="10" step="0.5" require>
              <div class="row">
                <div class="col-md-6 text-center pb-5">
                <h2><span class="badge blue lighten-2 mb-4">Nous ne nous connaissons pas </span></h2>
                <h2 class="display-4" style="color:red"><strong id="resellerEarnings">0/10</strong></h2>
              </div>
              <div class="col-md-6 text-center pb-5">
                <h2><span class="badge blue lighten-2 mb-4">Nous nous connaissons très bien</span></h2>
                <h2 class="display-4" style="color:green"><strong id="clientPrice">10/10</strong></h2>
              </div>
            </div>
          </div>
          <button class="btn btn-lg btn-success" onclick="mettreUneNote();" type="submit">AJOUTER</button>
        </div>
    </form>

      @elseif($connecte == 0 )

        <form class="range-field my-5" action="{{ route('annulerUneConnexion') }}">
          <input type="hidden" name="id_user2" value={{$userInfo[0]}} />
          <button class="btn btn-lg btn-success" name="user_id2" value={{$userInfo[0]}} onclick="mettreUneNote();" type="submit">Annuler la demande</button>
        </form>

      @elseif($connecte == 1 )

      <div class="card">
          <div class="card-body">
            <h3 class="text-center font-weight-bold blue-text mt-3 mb-4 pb-4"><strong>Veuillez évaluer le degré de proximité qui vous lie avec cette utilisateur </strong></h3>
    <form class="range-field my-5" action="{{ route('confirmerUneConnexion') }}">
              <input type="hidden" name="id_user2" value={{$userInfo[0]}} />
              <input type="range" class="form-control-range" id="note" name="note" min="0" max="10" step="0.5" require>
              <div class="row">
                <div class="col-md-6 text-center pb-5">
                <h2><span class="badge blue lighten-2 mb-4">Nous ne nous connaissons pas </span></h2>
                <h2 class="display-4" style="color:red"><strong id="resellerEarnings">0/10</strong></h2>
              </div>
              <div class="col-md-6 text-center pb-5">
                <h2><span class="badge blue lighten-2 mb-4">Nous nous connaissons très bien</span></h2>
                <h2 class="display-4" style="color:green"><strong id="clientPrice">10/10</strong></h2>
              </div>
            </div>
          </div>
          <button class="btn btn-lg btn-success" onclick="mettreUneNote();" type="submit">Noter et accepter</button>
        </div>
    </form>

    @elseif($connecte == 2 )

      <p> Vous etes maintenant amis </p>

    @endif

  @endif

</main>
@endsection

