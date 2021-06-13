<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inputan as Inputan;
use Ramsey\Uuid\Uuid;

class InputBukuController extends Controller
{
    public function Index(Request $request){
        $dataa = new Inputan;
        $kode = $dataa->Kode();
        $response = $dataa->InputBukuIndex();
        $data = json_decode($response);
        return view('admin.inputan.input_buku')->with('data', $data)->with('kode',$kode);
    }
    public function add(Request $req){
        $data = new Inputan;
        $kode = $req['kode'];
        $judul = $req['judul'];
        $noisbn = $req['noisbn'];
        $penulis = $req['penulis'];
        $penerbit = $req['penerbit'];
        $tahun = $req['tahun'];
        $stok = $req['stok'];
        $hargapokok = $req['hargapokok'];
        $hargajual = $req['hargajual'];
        $ppn = $req['ppn'];
        $diskon = $req['diskon'];
        $jmlhpenjualan = 0;
        $totalpnjualan = 0;

        $payload = [
            'id' => $kode,
            'judul' => $judul,
            'noisbn' => $noisbn,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun' => $tahun,
            'stok' => $stok,
            'harga_pokok' => $hargapokok,
            'harga_jual' => $hargajual,
            'ppn' => $ppn,
            'diskon' => $diskon,
            'jumlah_penjualan' =>$jmlhpenjualan,
            'total_penjualan' =>$totalpnjualan,
        ];
        $response = $data->InputBukuadd($payload);
        if($response == 'true'){
            return redirect('/input-buku');
        }
    }
    public function edit(Request $req){
        $data = new Inputan;
        $id = $req['kode'];
        $judul = $req['judul'];
        $noisbn = $req['noisbn'];
        $penulis = $req['penulis'];
        $penerbit = $req['penerbit'];
        $tahun = $req['tahun'];
        $stok = $req['stok'];
        $hargapokok = $req['hargapokok'];
        $hargajual = $req['hargajual'];
        $ppn = $req['ppn'];
        $diskon = $req['diskon'];
        $jmlhpenjualan = $req['jumlah'];
        $totalpnjualan = $req['total'];
        $payload = [
            'id' => $id,
            'judul' => $judul,
            'noisbn' => $noisbn,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun' => $tahun,
            'stok' => $stok,
            'harga_pokok' => $hargapokok,
            'harga_jual' => $hargajual,
            'ppn' => $ppn,
            'diskon' => $diskon,
            'jumlah_penjualan' =>$jmlhpenjualan,
            'total_penjualan' =>$totalpnjualan,
        ];
        $response = $data->InputBukuedit($payload,$id);
        if($response == '1'){
            return redirect('/input-buku');
        }
    }

    public function delete(Request $req, $id){
        $data = new Inputan;
        $response = $data->InputBukudelete($id);
        if($response == '1'){
            return redirect('/input-buku');
        }
    }
}
