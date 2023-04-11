<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $table = 'target';
    protected $primaryKey = 'Id_Target';
    protected $fillable = ['nama','instalasi','bulan','tugas','target','persentase','kepala_bblk','kepala_instalasi'];
    public $timestamps = false;

}
