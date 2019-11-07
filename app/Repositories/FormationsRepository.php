<?php 

namespace App\Repositories;

use App\Formations;

class FormationsRepository implements FormationsRepositoryInterface
{

    protected $formations;

    public function __construct(Formations $formations)
    {
        $this->formations = $formations;
    }

    public function save()
    {

    }

    public function getData()
    {

    }


}