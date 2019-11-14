<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\FormationRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\FormationsRepository;

class FormationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_form()
    {
        return view('Application/formationsFORM');
    }

    public function postFormFormation(FormationsRepository $formationsRepository,FormationRequest $request) 
  {
    $id_user = Auth::id();
    $formationsRepository->save($id_user, $request->input('ecole'), $request->input('diplome'), strtoupper ($request->input('debut')), $request->input('fin'), $request->input('resultat'), $request->input('description'));
    return view('Application/formationsFORM');
  }

}
