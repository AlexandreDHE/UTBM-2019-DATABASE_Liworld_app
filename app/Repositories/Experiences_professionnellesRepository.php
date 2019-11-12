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

    public function save($id_user, $id_typesContrats, $id_entreprise, $nomPoste, $dateDebut, $dateFin, $description, $numeroVoie, $rue, $ville, $codePostale)
    {
        $this->experiencesProfessionnelles = new Experiences_professionnelles;
        $this->experiencesProfessionnelles->id_user = $id_user;
        $this->experiencesProfessionnelles->id_typesContrats = $id_typesContrats;
        $this->experiencesProfessionnelles->id_entreprise = $id_entreprise;
        $this->experiencesProfessionnelles->nomPoste = $nomPoste;
        $this->experiencesProfessionnelles->dateDebut = $dateDebut;
        $this->experiencesProfessionnelles->dateFin = $dateFin;
        $this->experiencesProfessionnelles->description = $description;
        $this->experiencesProfessionnelles->numeroVoie = $numeroVoie;
        $this->experiencesProfessionnelles->rue = $rue;
        $this->experiencesProfessionnelles->ville = $ville;
        $this->experiencesProfessionnelles->codePostale = $codePostale;
        $this->experiencesProfessionnelles->save();
    }

    public function getData()
    {

    }


}