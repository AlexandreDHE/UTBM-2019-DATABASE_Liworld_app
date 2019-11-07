<?php

namespace App\Http\Controllers;

use App\Repositories\EntreprisesRepository;

use App\Http\Requests\EntrepriseRequest; 
use App\Http\Requests\TypePosteRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

/*****************************/
/* GET -- AFFICHAGE DES VUES */
/*****************************/

  public function index_entreprise()
  {

      return view('admin/sections/entrepriseForm');

  }

  public function index_typePoste()
  {
    $typePoste = array(array());
    $typePoste = $this->getDataTypePoste();
    return view('admin/sections/typePosteForm')->with('typePoste', $typePoste);
  }

/***************************************/
/* POST -- FORMULAIRE D'ADMINISTRATION */
/***************************************/

  public function postFormEntreprise(EntrepriseRequest $request, EntreprisesRepository $entreprisesRepository)
  {
      $entreprisesRepository->save("Liworld", "17", "allé des chenes", "Boissise le roi", "77310");
      return view('admin/sections/entrepriseForm');
  }



































































  public function postFormTypePoste(EntrepriseRequest $request)
  {
      $table = new TypePoste;
      $table->description = $request->input('nom');
      $table->save();

      $typePoste = array(array());
      $typePoste = $this->getDataTypePoste();
      return view('admin/sections/typePosteForm')->with('typePoste', $typePoste);
  }











  
  public function getDataTypePoste()
  {
    $res = array(array());
    $req = DB::table('typesPostes')->select('description')->get();
    $i = 0;

    foreach ($req as $req) {
        $res[$i][0] = $req->description;
        $i++;
    }

    return $res;
  }

}
