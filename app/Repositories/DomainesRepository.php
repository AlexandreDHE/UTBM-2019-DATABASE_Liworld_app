<?php 

namespace App\Repositories;

use App\Domaines;

class DomainesRepository implements DomainesRepositoryInterface
{

    protected $domaines;

    public function __construct(Domaines $domaines)
    {
        $this->domaines = $domaines;
    }

    public function save()
    {

    }

    public function getData()
    {

    }


}