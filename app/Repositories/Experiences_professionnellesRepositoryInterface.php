<?php 

namespace App\Repositories;

interface Experiences_professionnellesRepositoryInterface
{
    public function save($id_user, $id_typesContrats, $id_entreprise, $nomPoste, $dateDebut, $dateFin, $description, $numeroVoie, $rue, $ville, $codePostale);
    public function getData();
}