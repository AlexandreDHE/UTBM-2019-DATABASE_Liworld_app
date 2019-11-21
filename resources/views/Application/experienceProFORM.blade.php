@extends('layouts.app')

@section('content')


<main class="container mt-5" role="main">
  <div class="container"> 

    <!-- EXPERIENCE   --> 
    <form method="GET" class="register-form" action="{{ route('postFormExperiencePro') }}">

    <div class="card-body secondary">

        <div class="my-3 p-3 bg-white rounded shadow-sm ">

            <div class="row bg-dark mb-2 rounded">

                <div class="col-3 pt-2">
                    <p style="font-size: 30px;" class="text-white "></b>Nom du poste</b></p>
                </div>

                <div class="col-9 pt-3">

                    <input style="font-size: 20px;" id="nomPoste" type="text" class="form-control{{ $errors->has('nomPoste') ? ' is-invalid' : '' }}" name="nomPoste" value="{{ old('nomPoste') }}" >

                    @if ($errors->has('nomPoste'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nomPoste') }}</strong>
                        </span>
                    @endif
                </div>

            </div>   

            <div style="background-color:#85aabd;" class="row rounded col-12 mt-4 mb-4 ml-1">
                <h4 class="pl-2 pt-3 d-block text-dark "><b>L'entreprise</b></h4>
            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Numéro:</strong></p>
                </div>

                <div class="col-9">
        
                    <input id="numéro" type="text" class="form-control{{ $errors->has('numéro') ? ' is-invalid' : '' }}" name="numéro" value="{{ old('numéro') }}" >

                        @if ($errors->has('numéro'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('numéro') }}</strong>
                            </span>
                        @endif

                </div>

            </div>



            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Adresse:</strong></p>
                </div>

                <div class="col-9">
        
                    <input id="rue" type="text" class="form-control{{ $errors->has('rue') ? ' is-invalid' : '' }}" name="rue" value="{{ old('rue') }}" >

                    @if ($errors->has('rue'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('rue') }}</strong>
                        </span>
                    @endif

                </div>

            </div>


            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Code postale:</strong></p>
                </div>

                <div class="col-9">
        
                    <input id="cp" type="text" class="form-control{{ $errors->has('cp') ? ' is-invalid' : '' }}" name="cp" value="{{ old('cp') }}" >

                    @if ($errors->has('cp'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cp') }}</strong>
                        </span>
                    @endif

                </div>

            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Ville:</strong></p>
                </div>

                <div class="col-9">
        
                    <input id="ville" type="text" class="form-control{{ $errors->has('ville') ? ' is-invalid' : '' }}" name="ville" value="{{ old('ville') }}" >

                    @if ($errors->has('ville'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ville') }}</strong>
                        </span>
                    @endif

                </div>

            </div>

            <div style="background-color:#85aabd;" class="row rounded col-12 mt-4 mb-4 ml-1">
                <h4 class="pl-2 pt-3 d-block text-dark "><b>Informations sur le poste</b></h4>
            </div>

     
            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Type de contrat:</strong></p>
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
                    <p><strong class="d-block text-dark">Nom de l'entreprise:</strong></p>
                </div>

                <div class="col-9">
        
                    <select id="id_entreprise" name="id_entreprise" class="custom-select" id="id_entreprise">
                        @for ($i = 0; $i < count($entreprises)-1; $i++)
                            <option value={{$entreprises[$i+1][5]}}>{{$entreprises[$i+1][0]}}</option>
                        @endfor
                    </select>

                    @if ($errors->has('id_entreprise'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('id_entreprise') }}</strong>
                        </span>
                    @endif

                </div>
                
            </div>


            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Date de début:</strong></p>
                </div>

                <div class="col-9">
                    <input id="debut" type="date" class="form-control{{ $errors->has('debut') ? ' is-invalid' : '' }}" name="debut" value="{{ old('debut') }}" >    
                </div>
                
            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Date de fin:</strong></p>
                </div>

                <div class="col-9">
                    <input id="fin" type="date" class="form-control{{ $errors->has('fin') ? ' is-invalid' : '' }}" name="fin" value="{{ old('fin') }}" >
                </div>
                
            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Description:</strong></p>
                </div>

                <div class="col-9">

                    <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" rows="6" cols="60"></textarea>

                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif

                </div>
                
            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-lg btn-success col-12 mt-3" id="submit" name="submit"><b>Success</b></button>
            </div>

        </div>

    </div>

</form>


</main>
@endsection







