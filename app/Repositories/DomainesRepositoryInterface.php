<?php 

namespace App\Repositories;

interface DomainesRepositoryInterface
{
    public function save($nom);
    public function getData();
}