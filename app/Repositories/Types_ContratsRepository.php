<?php 

namespace App\Repositories;

use App\Types_Contrats;

class Types_ContratsRepository implements Types_ContratsRepositoryInterface
{

    protected $typesContrats;

    public function __construct(Types_Contrats $typesContrats)
    {
        $this->typesContrats = $typesContrats;
    }

    public function save()
    {

    }

    public function getData()
    {

    }


}