<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\UsersRepository;
use App\Repositories\AmitieesRepository;
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

  public function showProfil(SearchRequest $request, UsersRepository $usersRepository, AmitieesRepository $amitieesRepository){
    $res = $usersRepository->getData($request->input('search'));
    $conencte = $amitieesRepository->sommesNousConnecte(Auth::id(), $res[0]);
    return view('Application/profil')->with('userInfo', $res )->with('auth', Auth::id())->with('connecte', $conencte);
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
