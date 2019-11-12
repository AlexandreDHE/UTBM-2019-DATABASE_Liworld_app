<?php

namespace App\Http\Controllers;

use App\Repositories\EntreprisesRepository;
use App\Repositories\Types_ContratsRepository;
use App\Repositories\DomainesRepository;
use App\Repositories\Entreprises_DomainesRepository;

use App\Http\Requests\EntrepriseRequest; 
use App\Http\Requests\TypePosteRequest;
use App\Http\Requests\DomaineRequest; 

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

  public function index_entreprise(EntreprisesRepository $entreprisesRepository, DomainesRepository $domainesRepository)
  {
    $res1 = array(array());
    $res1 = $this->getEntreprises($entreprisesRepository);
    $res2 = array(array());
    $res2 = $this->getDomaines($domainesRepository);
    return view('admin/sections/entreprisesForm')->with('entreprises', $res1)->with('domaines', $res2);
  }

  public function index_types_Contrats(Types_ContratsRepository $types_ContratsRepository)
  {
    $res = array(array());
    $res = $this->getTypes_Contrats($types_ContratsRepository);
    return view('admin/sections/typesContratsForm')->with('types_Contrats', $res);
  }

  public function index_domaines(DomainesRepository $domainesRepository)
  {
    $res = array(array());
    $res = $this->getDomaines($domainesRepository);
    return view('admin/sections/domainesForm')->with('domaines', $res);
  }

/***************************************/
/* GET -- FORMULAIRE D'ADMINISTRATION  */
/***************************************/

  public function getEntreprises(EntreprisesRepository $entreprisesRepository)
  {
    return $entreprisesRepository->getData();
  }

  public function getTypes_Contrats(Types_ContratsRepository $types_ContratsRepository)
  {
    return $types_ContratsRepository->getData();
  }

  public function getDomaines(DomainesRepository $domainesRepository)
  {
    return $domainesRepository->getData();
  }

/***************************************/
/* POST -- FORMULAIRE D'ADMINISTRATION */
/***************************************/

  public function postFormEntreprise(EntrepriseRequest $request, EntreprisesRepository $entreprisesRepository, DomainesRepository $domainesRepository, Entreprises_DomainesRepository $entreprises_Domaines) 
  {
    $entreprisesRepository->save(strtoupper ($request->input('nom')),$request->input('numeroVoie'), strtoupper ($request->input('rue')), strtoupper ($request->input('ville')), strtoupper ($request->input('codePostale')));
    $res = $this->getEntreprises($entreprisesRepository);
    $idEntreprise = $entreprisesRepository->getID(strtoupper ($request->input('nom')));


    $id_domaine = $request->input('domaines');

    for ($i = 0; $i<count($id_domaine); $i++){
      echo((int) $id_domaine[$i]);
      $entreprises_Domaines->save((int) $idEntreprise, (int) $id_domaine[$i] );
    }

    $res2 = array(array());
    $res2 = $this->getDomaines($domainesRepository);

    return view('admin/sections/entreprisesForm')->with('entreprises', $res)->with('domaines', $res2);
  }


  public function postTypes_Contrats(TypePosteRequest $request, Types_ContratsRepository $types_ContratsRepository)
  {
    $types_ContratsRepository->save(strtoupper ($request->input('description')));
    $res = $this->getTypes_Contrats($types_ContratsRepository);
    return view('admin/sections/typesContratsForm')->with('types_Contrats', $res);
  }

  public function postDomaines(DomaineRequest $request, DomainesRepository $domainesRepository)
  {
    $domainesRepository->save(strtoupper ($request->input('nom')));
    $res = $this->getDomaines($domainesRepository);
    return view('admin/sections/domainesForm')->with('domaines', $res);
  }

}
