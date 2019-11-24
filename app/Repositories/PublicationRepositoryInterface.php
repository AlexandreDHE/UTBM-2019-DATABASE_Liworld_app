<?php 

namespace App\Repositories;

interface PublicationRepositoryInterface
{
    public function save($id_user, $typePublication, $titre ,$contenu );
    public function showPublications($myId);
}