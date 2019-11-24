<?php 

namespace App\Repositories;

use App\Publication;
use Illuminate\Support\Facades\DB;
use App\Amitiees;

class PublicationRepository implements PublicationRepositoryInterface
{

    protected $publication;

    public function __construct(Publication $publication)
    {
        $this->publication = $publication;
    }

    public function save($id_user, $typePublication, $titre ,$contenu )
    {
        $this->publication = new Publication;
        $this->publication->id_user = $id_user;
        $this->publication->titre = $titre;
        $this->publication->contenu = $contenu;
        $this->publication->created_at = now();
        $this->publication->save();
    }

    public function showPublications($myId){
 
        $res = array(array());
        $req = DB::table('publication')
        ->join('amitiees', 'publication.id_user','=', 'amitiees.id_user1')
        ->select('titre', 'contenu', 'created_at' )
        ->where('amitiees.id_user1','=', $myId)
        ->where('amitiees.note_user2','!=',-1)
        ->orWhere('amitiees.id_user2','=', $myId)
        ->where('amitiees.note_user2','!=',-1)
        ->latest()->get();
        
        $i = 0;
    
        foreach ($req as $req) {
            $res[$i+1][0] = $req->titre;
            $res[$i+1][1] = $req->contenu;
            $res[$i+1][2] = $req->created_at;
            $i++;
        }

        $res[0] = $i ;
    
        return $res;

    }


}