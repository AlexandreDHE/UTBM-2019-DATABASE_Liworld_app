
@extends('admin.adminLayout')

@section('entreprise')
<div class="card-body">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">Enregistrer une entreprise</div>
        <div class="card-body">
            <form method="POST" action="{{ route('entrepriseFORM') }}">
                @csrf
                <div class="form-group row">
                    <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __("Nom de l'entreprise") }}</label>
                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" required autofocus>
                        @if ($errors->has('nom'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nom') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="numeroVoie" class="col-md-4 col-form-label text-md-right">{{ __('Domaine') }}</label>
                    <div class="col-md-6">
                        <select id="domaines" name="domaines[]" class="custom-select" id="domaines" multiple>
                            @for ($i = 0; $i < count($domaines)-1; $i++)
                            <option value={{$domaines[$i+1][1]}}>{{$domaines[$i+1][0]}}</option>
                            @endfor
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="numeroVoie" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de voie') }}</label>
                    <div class="col-md-6">
                        <input id="numeroVoie" type="text" class="form-control{{ $errors->has('numeroVoie') ? ' is-invalid' : '' }}" name="numeroVoie" value="{{ old('numeroVoie') }}" >
                        @if ($errors->has('numeroVoie'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('numeroVoie') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="rue" class="col-md-4 col-form-label text-md-right">{{ __('Rue') }}</label>
                    <div class="col-md-6">
                        <input id="rue" type="text" class="form-control{{ $errors->has('rue') ? ' is-invalid' : '' }}" name="rue" value="{{ old('rue') }}" >
                        @if ($errors->has('rue'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('rue') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="codePostale" class="col-md-4 col-form-label text-md-right">{{ __('Code postale') }}</label>
                    <div class="col-md-6">
                        <input id="codePostale" type="text" class="form-control{{ $errors->has('codePostale') ? ' is-invalid' : '' }}" name="codePostale" value="{{ old('codePostale') }}" >
                        @if ($errors->has('codePostale'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('codePostale') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
                    <div class="col-md-6">
                        <input id="ville" type="text" class="form-control{{ $errors->has('ville') ? ' is-invalid' : '' }}" name="ville" value="{{ old('ville') }}" >
                        @if ($errors->has('ville'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ville') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Valider') }}
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <div class="card-body">

        @if($entreprises[0] == 0)
            Pas encore d'entreprise
        @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Numéro</th>
                        <th scope="col">Voie</th>
                        <th scope="col">Code Postale</th>
                        <th scope="col">Ville</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 0; $i < count($entreprises)-1; $i++)
                        <tr>
                            <td scope="col">{{$entreprises[$i+1][0]}}</td>
                            <td scope="col">{{$entreprises[$i+1][1]}}</td>
                            <td scope="col">{{$entreprises[$i+1][2]}}</td>
                            <td scope="col">{{$entreprises[$i+1][4]}}</td>
                            <td scope="col">{{$entreprises[$i+1][3]}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @endif
    </div>

@endsection
