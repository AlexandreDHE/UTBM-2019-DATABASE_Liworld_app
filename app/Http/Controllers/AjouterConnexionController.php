<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\ProfilRequest;
use App\Repositories\Experiences_professionnellesRepository;

use App\Repositories\UsersRepository;
use App\Repositories\AmitieesRepository;
use App\Repositories\DomainesRepository;
use App\Repositories\Types_ContratsRepository;
use App\Repositories\EntreprisesRepository;

use App\Http\Controllers\FileActualieController;


use App\User;

class AjouterConnexionController extends Controller
{   

  private $variable;  

  public function __construct()
  {
    
  $this->middleware('auth');
  }

  public function search(Request $request)
  {
    $search = $request->get('term');
    $result = User::where('name', 'LIKE', '%'. $search. '%')->get();
    return response()->json($result);
  } 

  public function showProfil(Experiences_professionnellesRepository $experiences_professionnellesRepository, EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository,SearchRequest $request, UsersRepository $usersRepository, AmitieesRepository $amitieesRepository){
    $res = $usersRepository->getData($request->input('search'));
    $conencte = $amitieesRepository->sommesNousConnecte(Auth::id(), $res[0]);

    $res1 = $experiences_professionnellesRepository->getData($res[0]);

        for ($i = 0; $i < count($res1)-1; $i++){
            $res1[$i+1][0] = $types_ContratsRepository->getTypeContrat((int) $res1[$i+1][0]);
            $res1[$i+1][1] = $entreprisesRepository->getNOM((int) $res1[$i+1][1]);
        }

        echo $res[2][4];



    return view('Application/profil')->with('userInfo', $res )->with('auth', Auth::id())->with('connecte', $conencte)->with('res', $res1);
  }

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

  public function confirmerUneConnexion(SearchRequest $request1, ProfilRequest $request, UsersRepository $usersRepository, AmitieesRepository $amitieesRepository){
    $amitieesRepository->confirmerUneConnexion(Auth::id(),$request->input('id_user2'), $request->input('note'));
    $res = $usersRepository->getDataID($request->input('id_user2'));
    $conencte = $amitieesRepository->sommesNousConnecte(Auth::id(), $res[0]);
    return view('Application/profil')->with('userInfo', $res )->with('auth', Auth::id())->with('connecte', $conencte);
  }

}
