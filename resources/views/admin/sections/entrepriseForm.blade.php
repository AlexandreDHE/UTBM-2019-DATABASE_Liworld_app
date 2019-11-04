
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
                    <label for="siegeSocial" class="col-md-4 col-form-label text-md-right">{{ __('Siege social') }}</label>

                    <div class="col-md-6">
                        <input id="siegeSocial" type="text" class="form-control{{ $errors->has('siegeSocial') ? ' is-invalid' : '' }}" name="siegeSocial" value="{{ old('siegeSocial') }}" >

                        @if ($errors->has('siegeSocial'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('siegeSocial') }}</strong>
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

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Siège social</th>
            </tr>
          </thead>

          <tbody>
            @if(count($entreprises)>1)
              @for ($i = 0; $i < count($entreprises); $i++)
                <tr>
                  <td>{{$entreprises[$i][0]}}</td>
                  <td>{{$entreprises[$i][1]}}</td>
                </tr>
              @endfor
            @endif
          </tbody>
        </table>
      </div>

@endsection
