<?php 

namespace App\Repositories;

use App\Formations;
use Illuminate\Support\Facades\DB;

class FormationsRepository implements FormationsRepositoryInterface
{

    protected $formations;

    public function __construct(Formations $formations)
    {
        $this->formations = $formations;
    }

    public function save($id_user, $ecole, $diplome, $dateDebut, $dateFin, $resultat, $description)
    {
        $this->formations = new Formations;
        $this->formations->id_user = $id_user;
        $this->formations->dernierAjout = true;
        $this->formations->ecole = $ecole;
        $this->formations->diplome = $diplome;
        $this->formations->dateDebut = $dateDebut;
        $this->formations->dateFin = $dateFin;
        $this->formations->resultat = $resultat;
        $this->formations->description = $description;
        $this->formations->save();


    }

    public function getData($id_user)
    {
        $res = array(array());
        $req = DB::table('formations')
            ->select('ecole', 'diplome', 'dateDebut', 'dateFin', 'resultat', 'description')
            ->where('id_user', $id_user)
            ->get();
    
        $i = 0;
    
        foreach ($req as $value) {
            $res[$i+1][0] = $value->ecole;
            $res[$i+1][1] = $value->diplome;
            $res[$i+1][2] = $value->dateDebut;
            $res[$i+1][3] = $value->dateFin;
            $res[$i+1][4] = $value->resultat;
            $res[$i+1][5] = $value->description;
            $i++;
        }

        $res[0] = $i ;
    
        return $res;
    }

    public function getID($id_user)
    {
        $req = DB::table('formations')->where('id_user', $id_user)->where('dernierAjout', true)->pluck('id');
        return $req[0];
    }

    public function setFalseDernierAjout($id_user){

        $req = DB::table('formations')->where('id_user', $id_user)->update(['dernierAjout'=>false]);

    }


}