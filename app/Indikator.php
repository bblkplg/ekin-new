<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'indikator';
    protected $primaryKey = 'idindikator';
    protected $fillable = ['indikator','instalasi'];

    public $timestamps = false;
}
