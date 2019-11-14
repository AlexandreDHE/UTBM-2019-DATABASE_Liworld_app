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

    public function save($id_user, $ecole, $diplome, $dateDebut, $dateFin, $resultat, $description)
    {
        $this->formations = new Formations;
        $this->formations->id_user = $id_user;
        $this->formations->ecole = $ecole;
        $this->formations->diplome = $diplome;
        $this->formations->dateDebut = $dateDebut;
        $this->formations->dateFin = $dateFin;
        $this->formations->resultat = $resultat;
        $this->formations->description = $description;
        $this->formations->save();
    }

    public function getData()
    {

    }


}