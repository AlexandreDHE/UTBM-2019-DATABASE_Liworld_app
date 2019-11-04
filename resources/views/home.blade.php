@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">CENTRE D'ADMINISTRATION</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                      <div class="card-deck mb-3 text-center">
                        <div class="card mb-4 shadow-sm">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Entreprise</h4>
                          </div>
                          <div class="card-body">
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Ajouter</button>
                          </div>
                        </div>

                        <div class="card mb-4 shadow-sm">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Types d'emploi </h4>
                          </div>
                          <div class="card-body">
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Ajouter</button>
                          </div>
                        </div>

                        <div class="card mb-4 shadow-sm">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Domaines d'activité</h4>
                          </div>
                          <div class="card-body">
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Ajouter</button>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
