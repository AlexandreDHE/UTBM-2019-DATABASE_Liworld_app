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

    @if($res[$i+1][0] == 1 )

        @if( $res[$i+1][5] == 2 )
        <div style="background-color:#de554b;border: 1px solid #de554b; text-white" class="mb-5 my-3 p-3 rounded shadow-sm" >

            <div  class="d-flex align-items-center my-3 text-white-50 rounded shadow-sm bg-white ">
                <div class="col-3">
                    <img src="{{ asset('images/searchjob.png') }}" width="50%" class="mx-auto d-block p-3" alt="Responsive image"> 
                </div>
                <div class="col-8">
                    <h3 style="color: #de554b;" class="pt-3"><b> {{$res[$i+1][2]}} </b></h3>
                </div>
            </div>

            <div class="col-12">               
                <h4 class=" p-2 text-white"><b>{{$res[$i+1][1][1]}} {{$res[$i+1][1][0]}} recherche un poste !</b></h4>
            </div>

        @elseif( $res[$i+1][5] == 1 )
        <div style="background-color:#6ec4c5; border: 1px solid #6ec4c5;" class="mb-5 my-3 p-3 rounded shadow-sm" >

            <div class="d-flex align-items-center my-3 text-white-50 rounded shadow-sm bg-white">
                <div class="col-4">
                    <img src="{{ asset('images/Offre_emploi.png') }}" width="75%" class="mx-auto d-block p-3" alt="Responsive image"> 
                </div>
                <div class="col-7">
                    <h3 style="color: #6ec4c5;" class="pt-3"><b> {{$res[$i+1][2]}} </b></h3>
                </div>
            </div>

            <div class="col-12">               
                <h4 class=" p-2 text-white"><b>{{$res[$i+1][1][1]}} {{$res[$i+1][1][0]}} propose un poste !  </b></h4>
            </div>
        @endif

    @else 
        <div class="mb-5 my-3 p-3 rounded shadow-sm bg-dark" >

            <div  class="d-flex align-items-center my-3 text-white-50 rounded shadow-sm bg-white ">
                <div class="col-3">
                    <img src="{{ asset('images/offre.png') }}" width="50%" class="mx-auto d-block p-3" alt="Responsive image"> 
                </div>
                <div class="col-8">
                    <h3 class="pt-3 text-dark "><b> {{$res[$i+1][2]}} </b></h3>
                </div>
            </div>

            <div class="col-12">
                <h4 class=" p-2 text-white"><strong class="text-white">Auteur:</strong><b>{{$res[$i+1][1][1]}} {{$res[$i+1][1][0]}} souhaite vous dire que ...   </b></h4>
            </div>
    @endif


    

        <div class="card-body secondary">
                
            
            
            <div class="row">

                @if($res[$i+1][0] == 1 )
                    <div class="col-4">
                        <div class="media text-muted pt-3">
                            <p style="font-size: 18px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-white">
                                <strong class="d-block">Type de contrat:</strong><b> {{$res[$i+1][6]}} </b>
                            </p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="media text-muted pt-3">
                            <p style="font-size: 18px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-white">
                                <strong class="d-block">Date de debut:</strong><b> {{$res[$i+1][7]}} </b>
                            </p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="media text-muted pt-3">
                            <p style="font-size: 18px;" class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray text-white">
                                <strong class="d-block">Date de fin:</strong><b> {{$res[$i+1][8]}} </b>
                            </p>
                        </div>
                    </div>
                @endif

                <div class="col-12 mx-auto  rounded mt-4">
                    <div class="row ">
                        <div class="col-sm">
                            
                            <div class="mt-3 row bg-white rounded">
                                <p style="font-size: 16px;" class="pl-2 p-3 d-block text-dark "><b>{{$res[$i+1][3]}}</b></p>
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
