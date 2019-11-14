<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Experiences_professionnellesRepository;
use App\Repositories\DomainesRepository;
use App\Repositories\Types_ContratsRepository;
use App\Repositories\EntreprisesRepository;

use Illuminate\Support\Facades\Auth;

class FileActualieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Experiences_professionnellesRepository $experiences_professionnellesRepository, EntreprisesRepository $entreprisesRepository, Types_ContratsRepository $types_ContratsRepository)
    {   
        $id_user = Auth::id();
        $res1 = $experiences_professionnellesRepository->getData($id_user);

        for ($i = 0; $i < count($res1)-1; $i++){
            $res1[$i+1][0] = $types_ContratsRepository->getTypeContrat((int) $res1[$i+1][0]);
            $res1[$i+1][1] = $entreprisesRepository->getNOM((int) $res1[$i+1][1]);
        }

        return view('Application/fileActualite')->with('res', $res1);
    }
    
}
