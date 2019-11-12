<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceProRequest; 

use App\Repositories\DomainesRepository;
use App\Repositories\Types_ContratsRepository;
use App\Repositories\EntreprisesRepository;
use App\Repositories\Experiences_professionnellesRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExperienceProController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index_form(EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository)
  {
    $res1 = $this->getEntreprises($entreprisesRepository);
    $res2 = $this->getTypes_Contrats($types_ContratsRepository);
    return view('Application/experienceProFORM')->with('entreprises', $res1)->with('types_Contrats', $res2);
  }

/*****************************/
/* GET -- AFFICHAGE DES VUES */
/*****************************/

  public function getEntreprises(EntreprisesRepository $entreprisesRepository)
  {
    return $entreprisesRepository->getData();
  }

  public function getTypes_Contrats(Types_ContratsRepository $types_ContratsRepository)
  {
    return $types_ContratsRepository->getData();
  }

/***************************************/
/* POST -- FORMULAIRE D'ADMINISTRATION */
/***************************************/

  public function postFormExperiencePro(EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository ,Experiences_professionnellesRepository $experiences_professionnellesRepository, ExperienceProRequest $request ) 
  {
    $id_user = Auth::id();
    $res1 = $this->getEntreprises($entreprisesRepository);
    $res2 = $this->getTypes_Contrats($types_ContratsRepository);
    $experiences_professionnellesRepository->save($id_user, $request->input('typeContrat'), $request->input('id_entreprise'), strtoupper ($request->input('nomPoste')), $request->input('debut'), $request->input('fin'), $request->input('description'), $request->input('numéro'), strtoupper ($request->input('rue')), strtoupper ($request->input('ville')), $request->input('cp'));
    return view('Application/experienceProFORM')->with('entreprises', $res1)->with('types_Contrats', $res2);
  }

}
