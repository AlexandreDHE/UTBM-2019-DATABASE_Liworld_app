@extends('layouts.app')

@section('content')

<form method="GET" class="register-form" action="{{ route('redigerPublicationFORM') }}">
    <div style="background-color:#eda628;" class="jumbotron  text-dark">
        <div class="container ">
        <h1 class="display-5">A la recherche d'un stage, d'une alternance ou autre ?<br><b> Informe ton réseau !</b> </h1>
        <p style="font-size: 18px;"><b>Ta publication permettra aussi d'informer les recruteurs ...  </b> </p><br>
        <button class="btn btn-light btn-lg col-lg-4" href="#" type="submit" role="button"><b>Rédiger</b> &raquo;</button>
        </div>
    </div>
</form>

<main role="main" class="container">

@for ($i = 0; $i < count($res)-1; $i++)

    <div style="background-color:#e3e8ea;" class="mb-5 my-3 p-3 rounded shadow-sm" >

        <div  class="d-flex align-items-center my-3 text-white-50 rounded shadow-sm bg-dark ">
            <div class="col-3">
                <img src="{{ asset('images/offre.png') }}" width="50%" class="mx-auto d-block p-3" alt="Responsive image"> 
            </div>
            <div class="col-8">
                <h3 class="pt-3 text-white "><b> {{$res[$i+1][0]}} </b></h3>
            </div>
        </div>

        <div class="card-body secondary">
                
            <div class="row">
                
                <div class="col-12">
                    <div class="media text-muted pt-3">
                        <p style="font-size: 18px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-dark">
                            <strong class="d-block text-dark">Auteur:</strong>
                        </p>
                    </div>
                </div>

                <div class="col-12 mx-auto  rounded mt-4">
                    <div class="row ">
                        <div class="col-sm">
                            
                            <div class="mt-3 row bg-white rounded">
                                <p style="font-size: 16px;" class="pl-2 p-3 d-block text-dark "><b>{{$res[$i+1][1]}}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endfor

</main><!-- /.container -->
@endsection
