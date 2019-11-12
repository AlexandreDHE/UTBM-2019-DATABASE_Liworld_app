<?php 

namespace App\Repositories;

use App\Entreprises_Domaines;
use Illuminate\Support\Facades\DB;

class Entreprises_DomainesRepository implements Entreprises_DomainesRepositoryInterface
{

    protected $entreprises_domaines;

    public function __construct(Entreprises_Domaines $entreprises_domaines)
    {
        $this->entreprises_domaines = $entreprises_domaines;
    }

    public function save($id_entreprise, $id_domaine)
    {
        $this->entreprises_domaines = new Entreprises_Domaines;
        $this->entreprises_domaines->id_entreprise = $id_entreprise;
        $this->entreprises_domaines->id_domaine = $id_domaine;
        $this->entreprises_domaines->save();
    }

    public function getData()
    {

    }


}