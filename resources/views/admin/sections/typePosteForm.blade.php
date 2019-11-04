@extends('admin.adminLayout')

@section('typePoste')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">Enregistrer un type  de  poste</div>

        <div class="card-body">
          <form method="POST" action="{{ route('typePosteFORM') }}">
              @csrf
              <div class="form-group row">
                  <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Type de poste') }}</label>

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

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Type d'emploi</th>
          </tr>
        </thead>

        <tbody>
          @if(count($typePoste)>1)
            @for ($i = 0; $i < count($typePoste); $i++)
              <tr>
                <td>{{$typePoste[$i][0]}}</td>
              </tr>
            @endfor
          @endif
        </tbody>
      </table>
    </div>

</div>
@endsection
