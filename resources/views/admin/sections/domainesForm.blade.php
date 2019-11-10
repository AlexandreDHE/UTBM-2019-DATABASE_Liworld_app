@extends('admin.adminLayout')

@section('typePoste')
<div class="card-body">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>

    @endif

    <div class="card">
        <div class="card-header">Enregistrer un domaine d'activité</div>

        <div class="card-body">
          <form method="POST" action="{{ route('domainesFORM') }}">
              @csrf

              <div class="form-group row">
                  <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom:') }}</label>
                  <div class="col-md-6">
                      <input id="nom" type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" >
                      @if ($errors->has('nom'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('nom') }}</strong>
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

        @if($domaines[0] == 0)
            Pas encore de domaine d'activité
        @else
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Type</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 0; $i < count($domaines)-1; $i++)
                        <tr>
                            <td scope="col">{{$domaines[$i+1][0]}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @endif
    </div>

</div>
@endsection
