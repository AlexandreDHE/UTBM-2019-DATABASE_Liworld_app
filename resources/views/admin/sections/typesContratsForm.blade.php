@extends('admin.adminLayout')

@section('typePoste')
<div class="card-body">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>

    @endif

    <div class="card">
        <div class="card-header">Enregistrer un type  de  contrat</div>

        <div class="card-body">
          <form method="POST" action="{{ route('typesContratsFORM') }}">
              @csrf

              <div class="form-group row">
                  <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Type:') }}</label>
                  <div class="col-md-6">
                      <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" >
                      @if ($errors->has('description'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('description') }}</strong>
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

        @if($types_Contrats[0] == 0)
            Pas encore de type de contrat
        @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Type</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 0; $i < count($types_Contrats)-1; $i++)
                        <tr>
                            <td scope="col">{{$types_Contrats[$i+1]}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @endif
    </div>

</div>
@endsection
