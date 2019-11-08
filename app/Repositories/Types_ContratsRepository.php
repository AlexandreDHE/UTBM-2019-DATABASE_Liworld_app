<?php 

namespace App\Repositories;

use App\Types_Contrats;
use Illuminate\Support\Facades\DB;

class Types_ContratsRepository implements Types_ContratsRepositoryInterface
{

    protected $typesContrats;

    public function __construct(Types_Contrats $typesContrats)
    {
        $this->typesContrats = $typesContrats;
    }

    public function save($description)
    {
        $this->typesContrats->description = $description;
        $this->typesContrats->save();
    }

    public function getData()
    {
        $res = array(array());
        $req = DB::table('typesContrats')->select('description' )->get();
        
        $i = 0;
    
        foreach ($req as $req) {
            $res[$i+1] = $req->description;
            $i++;
        }

        $res[0] = $i ;
    
        return $res;
    }


}