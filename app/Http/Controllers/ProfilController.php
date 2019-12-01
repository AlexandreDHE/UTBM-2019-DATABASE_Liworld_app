<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\ProfilRequest;
use App\Http\Requests\ExperienceProRequest; 
use App\Http\Requests\PublicationRequest; 
use App\Http\Requests\FormationRequest; 
use App\Repositories\Experiences_professionnellesRepository;
use App\Repositories\Formations_DomainesRepository;
use App\Repositories\FormationsRepository;
use App\Repositories\UsersRepository;
use App\Repositories\AmitieesRepository;
use App\Repositories\DomainesRepository;
use App\Repositories\Types_ContratsRepository;
use App\Repositories\EntreprisesRepository;
use App\Repositories\PublicationRepository;

use App\User;

class ProfilController extends Controller
{   

  public function __construct()
  {
    
  $this->middleware('auth');
  }


/***************************************/
/* GET                                 */
/***************************************/

  public function search(Request $request)
  {
    $search = $request->get('term');
    $result = User::where('name', 'LIKE', '%'. $search. '%')->get();
    return response()->json($result);
  } 

  public function getMonProfil(FormationsRepository $formationsRepository, Experiences_professionnellesRepository $experiences_professionnellesRepository, EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository){

    $res1 = $experiences_professionnellesRepository->getData(Auth::id());

      for ($i = 0; $i < count($res1)-1; $i++){
          $res1[$i+1][0] = $types_ContratsRepository->getTypeContrat((int) $res1[$i+1][0]);
          $res1[$i+1][1] = $entreprisesRepository->getNOM((int) $res1[$i+1][1]);
      } 

    $res2 = $formationsRepository->getData(Auth::id());

    return view('Application/monProfil')->with('res', $res1)->with('res2', $res2);
  }


  public function getProfil(FormationsRepository $formationsRepository, Experiences_professionnellesRepository $experiences_professionnellesRepository, EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository,SearchRequest $request, UsersRepository $usersRepository, AmitieesRepository $amitieesRepository){
    
    $res = $usersRepository->getData($request->input('search'));
    $conencte = $amitieesRepository->sommesNousConnecte(Auth::id(), $res[0]);

    $res1 = $experiences_professionnellesRepository->getData($res[0]);

      for ($i = 0; $i < count($res1)-1; $i++){
          $res1[$i+1][0] = $types_ContratsRepository->getTypeContrat((int) $res1[$i+1][0]);
          $res1[$i+1][1] = $entreprisesRepository->getNOM((int) $res1[$i+1][1]);
      }

      $res[2][4];

      $res2 = $formationsRepository->getData($res[0]);

    return view('Application/profil')->with('userInfo', $res )->with('auth', Auth::id())->with('connecte', $conencte)->with('res', $res1)->with('res2', $res2);
  }


  public function getFormExperiencePro( EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository)
  {
    $res1 = $entreprisesRepository->getData();
    $res2 = $types_ContratsRepository->getData();
    return view('Application/experienceProFORM')->with('entreprises', $res1)->with('types_Contrats', $res2);
  }


  public function getFormFormation(DomainesRepository $domainesRepository)
  {   
      $res1 = array(array());
      $res1 = $domainesRepository->getData();
      return view('Application/formationsFORM')->with('domaines', $res1);
  }



/***************************************/
/* POST                                */
/***************************************/


  public function ajouterUneConnexion(SearchRequest $request1, ProfilRequest $request, UsersRepository $usersRepository, AmitieesRepository $amitieesRepository){
    $amitieesRepository->ajouter(Auth::id(),  $request->input('id_user2') , $request->input('note'));
    $res = $usersRepository->getDataID($request->input('id_user2'));
    $conencte = $amitieesRepository->sommesNousConnecte(Auth::id(), $res[0]);

    return view('Application/profil')->with('userInfo', $res )->with('auth', Auth::id())->with('connecte', $conencte);
  }


  public function annulerUneConnexion(SearchRequest $request1, ProfilRequest $request, UsersRepository $usersRepository, AmitieesRepository $amitieesRepository){
    $amitieesRepository->annuler(Auth::id(),$request->input('id_user2'));
    $res = $usersRepository->getDataID($request->input('id_user2'));
    $conencte = $amitieesRepository->sommesNousConnecte(Auth::id(), $res[0]);
    return view('Application/profil')->with('userInfo', $res )->with('auth', Auth::id())->with('connecte', $conencte);
  }


  public function confirmerUneConnexion(Experiences_professionnellesRepository $experiences_professionnellesRepository, EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository,SearchRequest $request1, ProfilRequest $request, UsersRepository $usersRepository, AmitieesRepository $amitieesRepository){
    $amitieesRepository->confirmerUneConnexion(Auth::id(),$request->input('id_user2'), $request->input('note'));
    $res = $usersRepository->getDataID($request->input('id_user2'));
    $conencte = $amitieesRepository->sommesNousConnecte(Auth::id(), $res[0]);

    $res1 = $experiences_professionnellesRepository->getData($res[0]);

        for ($i = 0; $i < count($res1)-1; $i++){
            $res1[$i+1][0] = $types_ContratsRepository->getTypeContrat((int) $res1[$i+1][0]);
            $res1[$i+1][1] = $entreprisesRepository->getNOM((int) $res1[$i+1][1]);
        }

        $res[2][4];

    return view('Application/profil')->with('userInfo', $res )->with('auth', Auth::id())->with('connecte', $conencte)->with('res', $res1);
  }


  public function postFormExperiencePro(FormationsRepository $formationsRepository, EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository ,Experiences_professionnellesRepository $experiences_professionnellesRepository, ExperienceProRequest $request ) 
  {
    $id_user = Auth::id();
    $res1 = $entreprisesRepository->getData();
    $res2 = $types_ContratsRepository->getData();
    $experiences_professionnellesRepository->save($id_user, $request->input('typeContrat'), $request->input('id_entreprise'), strtoupper ($request->input('nomPoste')), $request->input('debut'), $request->input('fin'), $request->input('description'), $request->input('numéro'), strtoupper ($request->input('rue')), strtoupper ($request->input('ville')), $request->input('cp'));
    
    $res1 = $experiences_professionnellesRepository->getData(Auth::id());

      for ($i = 0; $i < count($res1)-1; $i++){
          $res1[$i+1][0] = $types_ContratsRepository->getTypeContrat((int) $res1[$i+1][0]);
          $res1[$i+1][1] = $entreprisesRepository->getNOM((int) $res1[$i+1][1]);
      } 

      $res2 = $formationsRepository->getData(Auth::id());
    
    return view('Application/monProfil')->with('res', $res1)->with('$res2', $res2);
  }


  public function postFormFormation(EntreprisesRepository  $entreprisesRepository,Types_ContratsRepository $types_ContratsRepository, Experiences_professionnellesRepository $experiences_professionnellesRepository, FormationsRepository $formationsRepository, DomainesRepository $domainesRepository, Formations_DomainesRepository $formations_DomainesRepository,FormationRequest $request) 
  {
      $id_user = Auth::id();
      $formationsRepository->save($id_user, $request->input('ecole'), $request->input('diplome'), strtoupper ($request->input('debut')), $request->input('fin'), $request->input('resultat'), $request->input('description'));
      $idFormation = $formationsRepository->getID($id_user);

      $id_domaine = $request->input('domaines');

      for ($i = 0; $i<count($id_domaine); $i++){
        $formations_DomainesRepository->save((int) $idFormation, (int) $id_domaine[$i] );
      }
      
      $formationsRepository->setFalseDernierAjout($id_user);
    
      $res1 = $experiences_professionnellesRepository->getData(Auth::id());

      for ($i = 0; $i < count($res1)-1; $i++){
          $res1[$i+1][0] = $types_ContratsRepository->getTypeContrat((int) $res1[$i+1][0]);
          $res1[$i+1][1] = $entreprisesRepository->getNOM((int) $res1[$i+1][1]);
      } 

      $res2 = $formationsRepository->getData(Auth::id());

      return view('Application/monProfil')->with('res', $res1)->with('res2', $res2);
  }




  /************************************************************************************************* */


}
