<?php 

namespace App\Repositories;

use App\Publication;
use App\TypePublication;
use Illuminate\Support\Facades\DB;
use App\Amitiees;

class PublicationRepository implements PublicationRepositoryInterface
{

    protected $publication;
    protected $typePublication;

    public function __construct(Publication $publication, TypePublication $typePublication)
    {
        $this->publication = $publication;
        $this->typePublication = $typePublication;
    }

    public function save($id_user, $typePublication, $titre ,$contenu, $typeContrat, $debut, $fin )
    {
        $this->publication = new Publication;
        $this->publication->id_user = $id_user;
        $this->publication->titre = $titre;
        $this->publication->contenu = $contenu;
        $this->publication->created_at = now();
        $this->publication->save();

       $id = DB::table('publication')->select('id')->where('id_user','=', $id_user)->max('id');


        if($typePublication == '1'){
            $this->typePublication = new TypePublication;
            $this->typePublication->id_publication = $id;
            $this->typePublication->type = $typePublication;
            $this->typePublication->id_typesContrats = $typeContrat;
            $this->typePublication->dateDebut = $debut;
            $this->typePublication->dateFin = $fin;
            $this->publication->created_at = now();
            $this->publication->updated_at = now();
            $this->typePublication->save();
        }else if($typePublication == '2'){
            $this->typePublication = new TypePublication;
            $this->typePublication->id_publication = $id;
            $this->typePublication->type = $typePublication;
            $this->typePublication->id_typesContrats = $typeContrat;
            $this->typePublication->dateDebut = $debut;
            $this->typePublication->dateFin = $fin;
            $this->publication->created_at = now();
            $this->publication->updated_at = now();
            $this->typePublication->save();
        }
    }

    public function showPublications($myId){
 
        $id_amis = array();

        $req = DB::table('amitiees')->select('id_user1')->where('id_user2','=', $myId )->where('note_user2', '!=', -1 )
        ->get();

        $i=0;

        foreach ($req as $req) {
            $id_amis[$i]= $req->id_user1;
            $id_amis = array_unique($id_amis);
            $i++;
        }

        $req = DB::table('amitiees')->select('id_user2')->where('id_user1','=', $myId )->where('note_user2', '!=', -1 )
        ->get();

        foreach ($req as $req) {
            $id_amis[$i]= $req->id_user2;
            $id_amis = array_unique($id_amis);
            $i++;
        }

        $j = 0;

        for ($i = 0; $i < count($id_amis); $i++){

            $question = DB::table('publication')->where('id_user','=', $id_amis[$i] )->exists();

            if($question == true){
                $req = DB::table('publication')
                ->select('publication.titre', 'publication.contenu', 'publication.created_at' )
                ->where('id_user', "=", $id_amis[$i])
                ->latest()
                ->distinct()
                ->get();
            
                foreach ($req as $req) {
                    $res[$j+1][0] = $req->titre;
                    $res[$j+1][1] = $req->contenu;
                    $res[$j+1][2] = $req->created_at;
                    $j++;
                }
            }
        }

        $res[0] = $j ;

        return $res;

    }


}