<?php 

namespace App\Repositories;

interface PublicationRepositoryInterface
{
    public function save($id_user, $typePublication, $titre ,$contenu, $typeContrat, $debut, $fin );
    public function showPublications($myId);
}