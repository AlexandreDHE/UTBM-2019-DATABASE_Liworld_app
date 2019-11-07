<?php 

namespace App\Repositories;

use App\Competences;

class CompetencesRepository implements EntreprisesRepositoryInterface
{

    protected $competences;

    public function __construct(Competences $competences)
    {
        $this->competences = $competences;
    }

    public function save()
    {

    }

    public function getData()
    {

    }


}