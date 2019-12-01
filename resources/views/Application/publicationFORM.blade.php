@extends('layouts.app')

@section('content')

<div style="background-color:#eda628;" class="jumbotron  text-dark">
        <div class="container ">
            <h1 class="display-5"><br><b> Dites-nous tous !</b> Nous allons informer votre réseau. </h1>
        </div>
    </div>
    
<main class="container mt-5" role="main">

    

  <div class="container"> 

    <!-- EXPERIENCE   --> 

<form method="get" class="register-form" action="{{ route('postFormPublication') }}">
    <div style="background-color:#e2e2e2;" class="my-3 rounded shadow-sm" >

    <div class="d-flex align-items-center my-3 text-white-50 bg-dark rounded shadow-sm ">
     
        <div class="col-12">
            <h1 class="pt-3 text-white "></b>Nouvelle publication</b></h1>
        </div>
    </div>

    <div class="card-body secondary">

        <div class="media text-muted pt-3">

            <div class="col-12">

                <div style="font-size: 18px;" class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label name="choix" style="font-size: 15px;" class="input-group-text" for="inputGroupSelect01">Type de publication</label>
                    </div>
                    <select name="choix" class="custom-select" id="inputGroupSelect01">
                        <option value="0" selected>Simple</option>
                        <option value="1">Offre d'emploi</option>
                        <option value="2">Recherche d'emploi</option>
                    </select>
                </div>          

            </div>

        </div>

        <div class="media text-muted pt-3">

            <div class="col-3">
                <p><strong class="d-block text-dark">Titre de la publication:</strong></p>
            </div>

            <div class="col-9">
    
                <input id="titre" type="text" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" value="{{ old('titre') }}" >

                @if ($errors->has('titre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('titre') }}</strong>
                    </span>
                @endif

            </div>

        </div>

        <div class="media text-muted pt-3">

            <div class="col-3">
                <p><strong class="d-block text-dark">Contenu:</strong></p>
            </div>

            <div class="col-9">

                <textarea wrap  id="Contenu" class="form-control{{ $errors->has('Contenu') ? ' is-invalid' : '' }}" name="Contenu" value="{{ old('Contenu') }}" rows="6" cols="60"></textarea>

                @if ($errors->has('Contenu'))
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                @endif

            </div>
            
        </div>

        <br><br>

        <div style="border: 1px solid red;" class="row rounded col-12 mt-4 mb-4 ml-1 bg-white">
            <h4 class="pl-2 pt-3 d-block text-danger"><b>A Renseigner pour une Offre / Recherche d'emploi</b></h4>
        </div>

     
            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-danger">Type de contrat:</strong></p>
                </div>

                <div class="col-9">
        
                    <select id="typeContrat" name="typeContrat" class="custom-select" id="typeContrat">
                        @for ($i = 0; $i < count($types_Contrats)-1; $i++)
                            <option value={{$types_Contrats[$i+1][1]}}>{{$types_Contrats[$i+1][0]}}</option>
                        @endfor
                    </select>

                    @if ($errors->has('typeContrat'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('typeContrat') }}</strong>
                        </span>
                    @endif

                </div>
            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-danger">Date de début:</strong></p>
                </div>

                <div class="col-9">
                    <input id="debut" type="date" class="form-control{{ $errors->has('debut') ? ' is-invalid' : '' }}" name="debut" value="{{ old('debut') }}" >    
                </div>
                
            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-danger">Date de fin:</strong></p>
                </div>

                <div class="col-9">
                    <input id="fin" type="date" class="form-control{{ $errors->has('fin') ? ' is-invalid' : '' }}" name="fin" value="{{ old('fin') }}" >
                </div>
                
            </div>


        <div class="form-submit">
            <button type="submit" class="btn btn-lg btn-success col-12 mt-5" id="submit" name="submit"><b>Publier</b></button>
        </div>


    </div>
<form>


</main>
@endsection