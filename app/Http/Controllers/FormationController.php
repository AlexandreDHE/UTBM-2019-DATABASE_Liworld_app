<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\FormationRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\FormationsRepository;
use App\Repositories\DomainesRepository;
use App\Repositories\Formations_DomainesRepository;

class FormationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_form(DomainesRepository $domainesRepository)
    {   
      $res1 = array(array());
      $res1 = $domainesRepository->getData();
      return view('Application/formationsFORM')->with('domaines', $res1);
    }

    public function postFormFormation(FormationsRepository $formationsRepository, DomainesRepository $domainesRepository, Formations_DomainesRepository $formations_DomainesRepository,FormationRequest $request) 
    {
      $id_user = Auth::id();
      $formationsRepository->save($id_user, $request->input('ecole'), $request->input('diplome'), strtoupper ($request->input('debut')), $request->input('fin'), $request->input('resultat'), $request->input('description'));
      $idFormation = $formationsRepository->getID($id_user);

      $id_domaine = $request->input('domaines');

      for ($i = 0; $i<count($id_domaine); $i++){
        $formations_DomainesRepository->save((int) $idFormation, (int) $id_domaine[$i] );
      }
      
      $formationsRepository->setFalseDernierAjout($id_user);
    
      $res1 = array(array());
      $res1 = $domainesRepository->getData();
      return view('Application/formationsFORM')->with('domaines', $res1);
  }

}
