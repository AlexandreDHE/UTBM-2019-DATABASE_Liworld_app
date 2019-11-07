<?php

namespace App\Repositories;
use App\Entreprise;

class Save_SimpleRequete implements Save_SimpleRequeteInterface
{

  protected $entreprise;

  /* Constructeur */
  public function __construc(Entreprise $entreprise)
  {
    $this->entreprise = $entreprise;
  }

  public function saveEntreprise($nom, $siegeSocial){
    $this->entreprise->nom = $nom;
    $this->entreprise->siegeSocial = $siegeSocial;
    $this->entreprise->save();
  }

}
