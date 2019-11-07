<?php 

namespace App\Repositories;

use App\Entreprises_Domaines;

class Entreprises_DomainesRepository implements Entreprises_DomainesRepositoryInterface
{

    protected $entreprises_domaines;

    public function __construct(Entreprises_Domaines $entreprises_domaines)
    {
        $this->entreprises_domaines = $entreprises_domaines;
    }

    public function save()
    {

    }

    public function getData()
    {

    }


}