<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DataPegawai extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'datapegawai';
    protected $primaryKey = 'api_id';
    protected $guarded = [];
}
