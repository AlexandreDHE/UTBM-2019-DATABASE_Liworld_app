<?php 

namespace App\Repositories;

use App\Experiences_professionnelles;

class Experiences_professionnellesRepository implements Experiences_professionnellesRepositoryInterface
{

    protected $experiencesProfessionnelles;

    public function __construct(Experiences_professionnelles $experiencesProfessionnelles)
    {
        $this->experiencesProfessionnelles = $experiencesProfessionnelles;
    }

    public function save()
    {

    }

    public function getData()
    {

    }


}