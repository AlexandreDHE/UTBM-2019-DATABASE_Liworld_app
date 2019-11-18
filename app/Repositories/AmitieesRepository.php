<?php 

namespace App\Repositories;

use App\Amitiees;
use Illuminate\Support\Facades\DB;


class AmitieesRepository implements AmitieesRepositoryInterface
{

    protected $amitiees;

    public function __construct(Amitiees $amitiees)
    {
        $this->amitiees = $amitiees;
    }

    public function ajouter($id_user1, $id_user2, $note_user1)
    {
        $this->amitiees = new Amitiees;
        $this->amitiees->id_user1 = $id_user1;
        $this->amitiees->id_user2 = $id_user2;
        $this->amitiees->note_user1 = $note_user1;
        $this->amitiees->note_user2 = -1;
        $this->amitiees->save();
    }

    public function annuler($id_user1, $id_user2)
    {
        $affectedRows = Amitiees::where('id_user1', '=', $id_user1)->where('id_user2','=', $id_user2)->delete();
    }

    public function getData()
    {
       
    }

    public function confirmerUneConnexion($id_user1, $id_user2, $note_user2){
        DB::table('amitiees')->where('id_user1','=', $id_user2)->where('id_user2','=', $id_user1)->update(['note_user2' => $note_user2]);
    }

    public function sommesNousConnecte($id_user1, $id_user2){

        $res = DB::table('amitiees')->where('id_user1','=', $id_user1)->where('id_user2','=', $id_user2)->exists();
        $res2 = DB::table('amitiees')->where('id_user1','=', $id_user2)->where('id_user2','=', $id_user1)->exists();

        if($res == true || $res2 == true){
            $res = DB::table('amitiees')->where('id_user1','=', $id_user1)->where('id_user2','=', $id_user2)->where('note_user2','=', -1)->exists();
            if($res == true ){
                return 0; // Demande de connexion USER 1 envoyé
            }else {
                $res = DB::table('amitiees')->where('id_user1','=', $id_user2)->where('id_user2','=', $id_user1)->where('note_user2','=', -1)->exists();
                if($res == true ){
                    return 1; // User 1 a recu une demande d'amis
                }else {
                    return 2; // Les personnes sont connectées entre elles
                }
            }
        }else{
            return -1; // Pas de lien d'amitié
        }

    }


}