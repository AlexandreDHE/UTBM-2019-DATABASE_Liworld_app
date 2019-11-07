<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperienceProController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

/*****************************/
/* GET -- AFFICHAGE DES VUES */
/*****************************/

  public function index()
  {
      return view('experiencePro');

  }
}
