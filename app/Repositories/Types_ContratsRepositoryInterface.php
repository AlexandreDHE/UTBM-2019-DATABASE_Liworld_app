<?php 

namespace App\Repositories;

interface Types_ContratsRepositoryInterface
{
    public function save($description);
    public function getData();
    public function getTypeContrat($id);
}