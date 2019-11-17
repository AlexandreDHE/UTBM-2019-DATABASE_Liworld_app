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
    }


}