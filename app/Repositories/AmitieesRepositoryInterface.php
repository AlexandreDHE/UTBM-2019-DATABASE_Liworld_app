<?php 

namespace App\Repositories;

interface AmitieesRepositoryInterface
{
    public function ajouter($id_user1, $id_user2, $note_user1);
    public function getData();
    public function sommesNousConnecte($id_user1, $id_user2);
    public function annuler($id_user1, $id_user2);
    public function confirmerUneConnexion($id_user1, $id_user2, $note_user2);
}