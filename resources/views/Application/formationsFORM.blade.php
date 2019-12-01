@extends('layouts.app')

@section('content')


<main class="container mt-5" role="main">
  <div class="container"> 

    <!-- EXPERIENCE   --> 
    <form method="POST" class="register-form" action="{{ route('formationFORM') }}">
    @csrf

    <div class="card-body secondary">

        <div class="my-3 p-3 bg-white rounded shadow-sm ">

    

            <div style="background-color:#85aabd;" class="row rounded col-12 mt-4 mb-4 ml-1">
                <h4 class="pl-2 pt-3 d-block text-dark "><b>Ton lieux de formation</b></h4>
            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Nom de l'école: *</strong></p>
                </div>

                <div class="col-9">
        
                    <input id="ecole" type="text" class="form-control{{ $errors->has('ecole') ? ' is-invalid' : '' }}" name="ecole" value="{{ old('ecole') }}" >

                    @if ($errors->has('ecole'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ecole') }}</strong>
                        </span>
                    @endif

                </div>

            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Domaine: *</strong></p>
                </div>

                <div class="col-9">
        
                    <select id="domaines" name="domaines[]" class="custom-select" id="domaines">
                        @for ($i = 0; $i < count($domaines)-1; $i++)
                        <option value={{$domaines[$i+1][1]}}>{{$domaines[$i+1][0]}}</option>
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
                    <p><strong class="d-block text-dark">Diplome: *</strong></p>
                </div>

                <div class="col-9">
        
                    <input id="diplome" type="text" class="form-control{{ $errors->has('diplome') ? ' is-invalid' : '' }}" name="diplome" value="{{ old('diplome') }}" >


                    @if ($errors->has('diplome'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('diplome') }}</strong>
                        </span>
                    @endif

                </div>

            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Résultat: *</strong></p>
                </div>

                <div class="col-9">
        
                    <input id="resultat" type="text" class="form-control{{ $errors->has('resultat') ? ' is-invalid' : '' }}" name="resultat" value="{{ old('resultat') }}" >

                    @if ($errors->has('resultat'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('resultat') }}</strong>
                        </span>
                    @endif

                </div>

            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Description:</strong></p>
                </div>

                <div class="col-9">

                    <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" rows="3" cols="60">

                    </textarea>


                    @if ($errors->has('ville'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ville') }}</strong>
                        </span>
                    @endif

                </div>
                
            </div>

            <div style="background-color:#85aabd;" class="row rounded col-12 mt-4 mb-4 ml-1">
                <h4 class="pl-2 pt-3 d-block text-dark "><b>Periode</b></h4>
            </div>

            <div class="media text-muted pt-3">

                <div class="col-3">
                    <p><strong class="d-block text-dark">Date de début: *</strong></p>
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

            <div class="form-submit">
                <button type="submit" class="btn btn-lg btn-success col-12 mt-3" id="submit" name="submit"><b>Valider</b></button>
            </div>

        </div>

    </div>

</form>

</main>
@endsection


