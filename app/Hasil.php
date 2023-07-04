<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';
    protected $guarded = [];
    public $timestamps = false;

    public function bulan($month)
    {
        if($month == 01){
            return $month = 'Januari';
        } elseif($month == 02){
            return $month = 'Februari';
        } elseif($month == 03){
            return $month = 'Maret';
        } elseif($month == 04){
            return $month = 'April';
        } elseif($month == 05){
            return $month = 'Mei';
        } elseif($month == 06){
            return $month = 'Juni';
        } elseif($month == 07){
            return $month = 'Juli';
        } elseif($month == '08'){
            return $month = 'Agustus';
        } elseif($month == '09'){
            return $month = 'September';
        } elseif($month == 10){
            return $month = 'Oktober';
        } elseif($month == 11){
            return $month = 'November';
        } elseif($month == 12){
            return $month = 'Desember';
        } else {
            return $month = '-';
        }
    }
}
