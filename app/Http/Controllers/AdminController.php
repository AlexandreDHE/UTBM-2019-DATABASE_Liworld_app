<?php

namespace App\Http\Controllers;

use App\Repositories\EntreprisesRepository;
use App\Repositories\Types_ContratsRepository;

use App\Http\Requests\EntrepriseRequest; 
use App\Http\Requests\TypePosteRequest;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

/*****************************/
/* GET -- AFFICHAGE DES VUES */
/*****************************/

  public function index_entreprise(EntreprisesRepository $entreprisesRepository)
  {
    $res = array(array());
    $res = $this->getEntreprise($entreprisesRepository);
    return view('admin/sections/entreprisesForm')->with('entreprises', $res);

  }

  public function index_types_Contrats(Types_ContratsRepository $types_ContratsRepository)
  {
    $res = array(array());
    $res = $this->getTypes_Contrats($types_ContratsRepository);
    return view('admin/sections/typesContratsForm')->with('types_Contrats', $res);
  }

/***************************************/
/* GET -- FORMULAIRE D'ADMINISTRATION  */
/***************************************/

  public function getEntreprise(EntreprisesRepository $entreprisesRepository)
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

  public function postFormEntreprise(EntrepriseRequest $request, EntreprisesRepository $entreprisesRepository)
  {
      $entreprisesRepository->save(strtoupper ($request->input('nom')),$request->input('numeroVoie'), strtoupper ($request->input('rue')), strtoupper ($request->input('ville')), strtoupper ($request->input('codePostale')));
      $res = $this->getEntreprise($entreprisesRepository);
      return view('admin/sections/entreprisesForm')->with('entreprises', $res);;
  }


  public function postTypes_Contrats(TypePosteRequest $request, Types_ContratsRepository $types_ContratsRepository)
  {
    $types_ContratsRepository->save(strtoupper ($request->input('description')));
    $res = $this->getTypes_Contrats($types_ContratsRepository);
    return view('admin/sections/typesContratsForm')->with('types_Contrats', $res);
  }

}
