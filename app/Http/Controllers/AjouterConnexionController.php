<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UsersRepository;
use App\User;

class AjouterConnexionController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(UsersRepository $userRepository)
  { 
    return view('Application/ajouterConnexion');
  }

  public function search(Request $request)
  {
    $search = $request->get('term');
    $result = User::where('name', 'LIKE', '%'. $search. '%')->get();
 
    return response()->json($result);
            
  } 

  public function showProfil(SearchRequest $request, UsersRepository $usersRepository){
    $res = $usersRepository->getData($request->input('search'));
    return view('Application/profil')->with('userInfo', $res )->with('auth', Auth::id());
  }

}
