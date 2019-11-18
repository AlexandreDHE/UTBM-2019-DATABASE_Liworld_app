<?php 

namespace App\Repositories;

interface UsersRepositoryInterface
{
    public function getData($name);
    public function getDataID($id);
}