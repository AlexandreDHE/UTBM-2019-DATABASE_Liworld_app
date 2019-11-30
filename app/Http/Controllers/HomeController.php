<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Repositories\PublicationRepository;
use App\Repositories\Types_ContratsRepository;
use App\Http\Requests\PublicationRequest; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PublicationRepository $publicationRepository)
    {   
        $res = array(array());
        $res = $publicationRepository->showPublications(Auth::id());
        return view('home')->with('res', $res);
    }

    public function redigerPublicationFORM(Types_ContratsRepository $types_ContratsRepository){
        $res2 = $types_ContratsRepository->getData();
        return view('Application/publicationFORM')->with('types_Contrats', $res2);
    }
    
    public function postFormPublication(PublicationRepository $publicationRepository, PublicationRequest $request ){
        $publicationRepository->save(Auth::id(), $request->input('choix'), $request->input('titre'), $request->input('Contenu'),  $request->input('typeContrat'),  $request->input('debut'), $request->input('fin') );
        $res = array(array());
        $res = $publicationRepository->showPublications(Auth::id());
        return view('home')->with('res', $res);
    }
}
