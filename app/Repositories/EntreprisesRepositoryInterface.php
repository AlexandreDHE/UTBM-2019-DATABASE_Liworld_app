<?php 

namespace App\Repositories;

interface EntreprisesRepositoryInterface
{
    public function save($nom, $numeroVoie, $rue, $ville, $codePostale);
    public function getData();
}


