<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $table = 'target';
    protected $primaryKey = 'Id_Target';
    protected $guarded = [];
    public $timestamps = false;

}
