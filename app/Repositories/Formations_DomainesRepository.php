<?php 

namespace App\Repositories;

use App\Formations_Domaines;

class Formations_DomainesRepository implements Formations_DomainesRepositoryInterface
{

    protected $formations_domaines;

    public function __construct(Formations_Domaines $formations_domaines)
    {
        $this->formations_domaines = $formations_domaines;
    }

    public function save($idFormation, $id_domaine)
    {
        $this->formations_domaines = new Formations_Domaines;
        $this->formations_domaines->id_formations = $idFormation;
        $this->formations_domaines->id_domaine = $id_domaine;
        $this->formations_domaines->save();
    }

    public function getData()
    {

    }


}