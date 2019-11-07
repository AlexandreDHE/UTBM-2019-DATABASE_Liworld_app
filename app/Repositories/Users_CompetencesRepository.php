<?php 

namespace App\Repositories;

use App\Users_Competences;

class Users_CompetencesRepository implements EntreprisesRepositoryInterface
{

    protected $users_competences;

    public function __construct(Users_Competences $users_competences)
    {
        $this->users_competences = $users_competences;
    }

    public function save()
    {

    }

    public function getData()
    {

    }


}