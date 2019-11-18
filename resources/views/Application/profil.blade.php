@extends('layouts.app')

@section('content')
<main class="container mt-5" role="main">
  <div class="container"> 

    @if($userInfo[0] == $auth)
      <h1>Mon Profil</h1>
    @else

      <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="row">
          <div class="col-sm">
            <div class="row">
              <h1 class="mx-auto d-block display-4">{{$userInfo[2]}} {{$userInfo[1]}}</h1>
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

      @if($connecte == -1 )

      <form class="mx-auto col-12" action="{{ route('ajouterUneConnexion') }}">
        <div class="jumbotron p-4 p-md-5 text-white rounded secondary">
          <div class="row">
            <h3 class="text-center font-weight-bold blue-text mt-3 mx-auto mb-4 pb-4 text-dark"><strong>Veuillez estimer votre degré de proximité avec cette utilisateur </strong></h3>
          </div>

          <div class="row">

            <input type="hidden" name="id_user2" value={{$userInfo[0]}} />
            <input type="range" class="form-control-range" id="note" name="note" min="0" max="10" step="0.5" require>
            <div class="col-md-6 text-center pb-5 mt-4">
              <h2><span class="badge blue lighten-2 mb-4 text-dark">Nous ne nous connaissons pas </span></h2>
              <h2 class="display-4" style="color:red"><strong id="resellerEarnings">0/10</strong></h2>
            </div>
            <div class="col-md-6 text-center pb-5 my-4">
              <h2><span class="badge blue lighten-2 mb-4 text-dark">Nous nous connaissons très bien</span></h2>
              <h2 class="display-4" style="color:green"><strong id="clientPrice">10/10</strong></h2>
            </div>
          </div>
          <div class="row">
            <button class="mx-auto btn btn-lg btn-dark col-4" type="submit">AJOUTER</button>
          </div>
          </div>
      </form>

      @elseif($connecte == 0 )

      <div class="jumbotron p-4 p-md-5 text-white rounded secondary">
        <h1 class="mx-auto d-block text-dark">Demande de connexion envoyée ! </h1>
        <form class="range-field my-5" action="{{ route('annulerUneConnexion') }}">
          <input type="hidden" name="id_user2" value={{$userInfo[0]}} />
          <button style="font-size: 22px;" class="btn btn-lg btn-danger col-12" name="user_id2" value={{$userInfo[0]}} onclick="mettreUneNote();" type="submit">Annuler la demande</button>
        </form>
      </div>

         
      @elseif($connecte == 1 )

      <form class="mx-auto col-12" action="{{ route('confirmerUneConnexion') }}">
        <div style="border: 3px solid #5ab55a;" class="jumbotron p-4 p-md-5 text-white rounded secondary">
          <div class="row">
            <h1 class="text-center font-weight-bold blue-text mt-3 mx-auto mb-4 pb-4 text-dark"><strong> Nouvelle demande de connexion !</strong></h1>
          </div>

          <div class="row">

            <input type="hidden" name="id_user2" value={{$userInfo[0]}} />
            <input type="range" class="form-control-range" id="note" name="note" min="0" max="10" step="0.5" require>
            <div class="col-md-6 text-center pb-5 mt-4">
              <h2><span class="badge blue lighten-2 mb-4 text-dark">Nous ne nous connaissons pas </span></h2>
              <h2 class="display-4" style="color:red"><strong id="resellerEarnings">0/10</strong></h2>
            </div>
            <div class="col-md-6 text-center pb-5 my-4">
              <h2><span class="badge blue lighten-2 mb-4 text-dark">Nous nous connaissons très bien</span></h2>
              <h2 class="display-4" style="color:green"><strong id="clientPrice">10/10</strong></h2>
            </div>
          </div>
          <div class="row">
            <button class="mx-auto btn btn-lg btn-success col-4" type="submit">Accepter</button>
            <button class="mx-auto btn btn-lg btn-danger col-4" type="submit">Refuser</button>
          </div>
          </div>
      </form>

    @elseif($connecte == 2 )

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4 shadow-sm">

              <div class="row bg-dark rounded">
                <div class="col-3">
                  <img src="{{ asset('images/exppro.png') }}" width="100%" class="mx-auto d-block" alt="Responsive image"> 
                </div>
                <div class="col-7">
                  <h1 class="pt-5 text-white ">Expériences professionnelles</h1>
                </div>
                <div class="col-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary mx-auto mt-4">Nouvelle experience</button>
                </div>
              </div>

              <!-- EXPEROENCE   --> 
              <div class="card-body secondary">
                <div class="my-3 p-3 bg-white rounded shadow-sm ">
                  <div class="row bg-dark mb-2 rounded">
                    <h4 class="pl-3 pt-3 border-bottom border-gray pb-2 mb-0 text-white">MBDA missile systems</h4>
                  </div>

                  <div class="media text-muted pt-3">
                    <div class="row">
                      <div class="col-2">
                        <img src="{{ asset('images/iconephoto.png') }}" width="100%" class=" d-block" alt="Responsive image"> 
                      </div>
                      <div class="col-10">
                        <p style="font-size: 14px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                          <strong class="d-block text-dark">ADRESSE</strong>
                          1 Avenue Réaumur<br>
                          92350<br>
                          Le Plessis-Robinson
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
                          <strong class="d-block text-dark">Contrat:</strong>CDD
                        </p>
                      </div>
                    </div>

                    <div class="col-2">
                      <div class="media text-muted pt-3">
                        <p style="font-size: 14px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                          <strong class="d-block text-dark">Date de début:</strong>01/04/2019
                        </p>
                      </div>
                    </div>

                    <div class="col-2">
                      <div class="media text-muted pt-3">
                        <p style="font-size: 14px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                          <strong class="d-block text-dark">Date de fin:</strong>15/06/2019
                        </p>
                      </div>
                    </div>
                    
                    <div class="col-11 mx-auto  rounded mt-4">
                      <div class="row ">
                        <div class="col-sm">
                          <div class="row bg-secondary rounded">
                            <h4 class="pl-2 pt-3 d-block text-white "><b>Poste:</b> Stagiaire en informatique</h4>
                          </div>
                          <div class="row">
                            <p style="font-size: 16px;" class="pl-2 pt-3 d-block text-dark ">Stage de fin de DUT</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- FIN -->
                
            </div>
          </div>
        </div> 
      </div>
    </div>

    @endif

  @endif

</main>
@endsection

