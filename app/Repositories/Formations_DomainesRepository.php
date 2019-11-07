<?php 

namespace App\Repositories;

use App\Formations_Domaines;

class Formations_DomainesRepository implements EntreprisesRepositoryInterface
{

    protected $formations_domaines;

    public function __construct(Formations_Domaines $formations_domaines)
    {
        $this->formations_domaines = $formations_domaines;
    }

    public function save()
    {

    }

    public function getData()
    {

    }


}