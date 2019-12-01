<?php 

namespace App\Repositories;

use App\Publication;
use App\TypePublication;
use App\Types_Contrats;
use App\User;
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

        if ($typePublication == 1 || $typePublication == 2){
            $this->typePublication = new TypePublication;
            $this->typePublication->id_publication = $id;
            $this->typePublication->type = $typePublication;
            $this->typePublication->id_typesContrats = $typeContrat;
            $this->typePublication->dateDebut = $debut;
            $this->typePublication->dateFin = $fin;
            $this->typePublication->created_at = now();
            $this->typePublication->updated_at = now();
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
                ->select('publication.titre', 'publication.contenu', 'publication.created_at', 'id' )
                ->where('id_user', "=", $id_amis[$i])
                ->latest()
                ->distinct()
                ->get();
            
                foreach ($req as $req) {

                    $userinfo = DB::table('users')
                    ->select('name', 'firstName')->where('id','=', $id_amis[$i] )->get();
                    
                    foreach ($userinfo as $userinfo) {
                        $res[$j+1][1][0] = $userinfo->name;
                        $res[$j+1][1][1] = $userinfo->firstName;
                    }


                    $res[$j+1][2] = $req->titre;
                    $res[$j+1][3] = $req->contenu;
                    $res[$j+1][4] = $req->created_at;

                    $question2 = DB::table('typePublication')->where('id_publication','=', $req->id )->exists();

                    if($question2 == true){

                        $res[$j+1][0] = 1;
                        
                        $req2 = DB::table('typePublication')
                        ->select('type', 'id_typesContrats', 'dateDebut', 'dateFin' )
                        ->where('id_publication','=', $req->id )
                        ->get();

                        foreach ($req2 as $req2) {
                            
                            $res[$j+1][5] = $req2->type;

                            $req3 = DB::table('typesContrats')
                            ->select('description')
                            ->where('id','=', $req2->id_typesContrats )
                            ->get();

                            foreach ($req3 as $req3) {
                                $res[$j+1][6] = $req3->description;
                            }

                            $res[$j+1][7] = $req2->dateDebut;
                            $res[$j+1][8] = $req2->dateFin;
                        }

                    }else if($question2 == false) {
                        $res[$j+1][0] = 0;
                    }
                    
                    $j++;
                }
            }
        }

        $res[0] = $j ;

        return $res;

    }


}