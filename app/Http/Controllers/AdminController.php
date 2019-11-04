<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntrepriseRequest;
use App\Http\Requests\TypePosteRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Entreprise;
use App\TypePoste;

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
      $entreprises = array(array());
      $entreprises = $this->getDataEntreprise();
      return view('admin/sections/entrepriseForm')->with('entreprises', $entreprises);

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

  public function postFormEntreprise(EntrepriseRequest $request)
  {
      $table = new Entreprise;
      $table->nom = $request->input('nom');
      $table->siegeSocial = $request->input('siegeSocial');
      $table->save();

      $entreprises = array(array());
      $entreprises = $this->getDataEntreprise();
      return view('admin/sections/entrepriseForm')->with('entreprises', $entreprises);
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

/***********************************/
/* SELECT -- AFFICHAGE DES DONNÉES */
/***********************************/

  public function getDataEntreprise()
  {
    $res = array(array());
    $req = DB::table('entreprises')->select('nom', 'siegeSocial')->get();
    $i = 0;

    foreach ($req as $req) {
        $res[$i][0] = $req->nom;
        $res[$i][1] = $req->siegeSocial;
        $i++;
    }

    return $res;
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
