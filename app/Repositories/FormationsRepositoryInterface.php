<?php 

namespace App\Repositories;

interface FormationsRepositoryInterface
{
    public function save($id_user, $ecole, $diplome, $dateDebut, $dateFin, $resultat, $description);
    public function getData($id_user);
    public function getID($id_user);
}