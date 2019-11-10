<?php 

namespace App\Repositories;

interface Entreprises_DomainesRepositoryInterface
{
    public function save($id_entreprise, $id_domaine);
    public function getData();
}