<?php 

namespace App\Repositories;

use App\Domaines;
use Illuminate\Support\Facades\DB;

class DomainesRepository implements DomainesRepositoryInterface
{

    protected $domaines;

    public function __construct(Domaines $domaines)
    {
        $this->domaines = $domaines;
    }

    public function save($nom)
    {
        $this->domaines->nom = $nom;
        $this->domaines->save();
    }

    public function getData()
    {
        $res = array(array());
        $req = DB::table('domaines')->select('nom')->get();
        
        $i = 0;
    
        foreach ($req as $req) {
            $res[$i+1] = $req->nom;
            $i++;
        }

        $res[0] = $i ;
    
        return $res;
    }


}