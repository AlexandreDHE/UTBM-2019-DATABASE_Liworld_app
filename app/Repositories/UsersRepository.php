<?php 

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;

class UsersRepository implements UsersRepositoryInterface
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getData($name)
    {
        

        $res = DB::table('users')->where('name','=', $name)->exists();

        if($res == true){

            echo ('exist!');
            $res = array(array());

            $req = DB::table('users')->select('id','name', 'firstName')->where('name', $name)->get();
        
            $i = 0;
        
            foreach ($req as $req) {
                $res[0] = $req->id;
                $res[1] = $req->name;
                $res[2] = $req->firstName;
                $i++;
            }
        
            return $res;
        }else {
            return -1;
        }  
    }

    public function getDataID($id)
    {
        $res = array(array());
        $req = DB::table('users')->select('id','name', 'firstName')->where('id', $id)->get();
        
        $i = 0;
    
        foreach ($req as $req) {
            $res[0] = $req->id;
            $res[1] = $req->name;
            $res[2] = $req->firstName;
            $i++;
        }
    
        return $res;
    }


}