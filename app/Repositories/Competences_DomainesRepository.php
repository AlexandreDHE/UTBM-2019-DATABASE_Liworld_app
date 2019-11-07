<?php 

namespace App\Repositories;

use App\Competences_Domaines;

class Competences_DomainesRepository implements EntreprisesRepositoryInterface
{

    protected $competences_domaines;

    public function __construct(Competences_Domaines $competences_domaines)
    {
        $this->competences_domaines = $competences_domaines;
    }

    public function save()
    {
        
    }

    public function getData()
    {
       
    }


}