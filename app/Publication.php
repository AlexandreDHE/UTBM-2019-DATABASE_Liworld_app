<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publication';
    public $timestamps = false;

    public function __save() {
       Model::save();
       return $this->_id;
    }

}
