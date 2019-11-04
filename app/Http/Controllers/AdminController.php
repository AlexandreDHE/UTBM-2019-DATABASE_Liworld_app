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

/* GET -- AFFICHAGE DES VUES */

  public function index_entreprise()
  {
      $entreprises = array(array());
      $entreprises = $this->getDataEntreprise();
      return view('admin/sections/entrepriseForm')->with('entreprises', $entreprises);

  }

  public function index_typePoste()
  {
      return view('admin/sections/typePosteForm');
  }


/* POST -- FORMULAIRE D'ADMINISTRATION */

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

  public function postFormTypePosnte(EntrepriseRequest $request)
  {
      $table = new TypePoste;
      $table->description = $request->input('nom');
      $table->save();
      return view('admin/sections/typePosteForm');
  }

/* SELECT -- AFFICHAGE DES DONNÉES */

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

}
