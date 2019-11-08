<?php 

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Entreprises;

class EntreprisesRepository implements EntreprisesRepositoryInterface
{

    protected $entreprises;

    public function __construct(Entreprises $entreprises)
    {
        $this->entreprises = $entreprises;
    }

    public function save($nom, $numeroVoie, $rue, $ville, $codePostale)
    {
        $this->entreprises->nom = $nom;
        $this->entreprises->numeroVoie = $numeroVoie;
        $this->entreprises->rue = $rue;
        $this->entreprises->ville = $ville;
        $this->entreprises->codePostale = $codePostale;
        $this->entreprises->save();
    }

    public function getData()
    {
        $res = array(array());
        $req = DB::table('entreprises')->select('nom', 'numeroVoie', "rue", "ville", "codePostale" )->get();
        
        $i = 0;
    
        foreach ($req as $req) {
            $res[$i+1][0] = $req->nom;
            $res[$i+1][1] = $req->numeroVoie;
            $res[$i+1][2] = $req->rue;
            $res[$i+1][3] = $req->ville;
            $res[$i+1][4] = $req->codePostale;
            $i++;
        }

        $res[0] = $i ;
    
        return $res;
    }


}