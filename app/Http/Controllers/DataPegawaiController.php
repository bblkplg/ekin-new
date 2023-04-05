<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPegawai;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $data['all'] = DataPegawai::all();

        return view('datapegawai.index', $data);
    }
}
