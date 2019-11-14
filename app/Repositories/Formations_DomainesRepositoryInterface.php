<?php 

namespace App\Repositories;

interface Formations_DomainesRepositoryInterface
{
    public function save($idFormation, $id_domaine);
    public function getData();
}