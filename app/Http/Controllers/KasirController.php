<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inputan as Inputan;
use Ramsey\Uuid\Uuid;

class KasirController extends Controller
{
    public function index(Request $req){
        $dataa = new Inputan;
        $kode = $dataa->KodeFaktur();
        $response = $dataa->InputBukuIndex();
        $data = json_decode($response);
        return view('kasir.inputan.input_penjualan')->with('data', $data)->with('kode',$kode);
    }
}
