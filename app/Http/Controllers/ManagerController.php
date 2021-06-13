<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inputan as Inputan;
use App\Models\Laporan as Laporan;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ManagerController extends Controller
{
    public function DataBuku(Request $request){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $response = $data->InputBukuIndex();
        $data = json_decode($response);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.semua_data_buku')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataBuku(Request $request){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $response = $data->InputBukuIndex();
        $data = json_decode($response);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.cetak_semua_data_buku')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function IndexBukuPerPenulis(Request $req){
        $data = new Inputan;
        $penulis = $data->DataPerPenulis();
        $data = json_decode($penulis);
        return view('manager.laporan.input_data_berdasarkan_penulis')
                ->with('data', $data);
    }
    public function DataBukuPerPenulis(Request $req){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $namapenulis = $req['namapenulis'];
        $penulis = $data->DataPerPenulisAll($namapenulis);
        $data = json_decode($penulis);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        $req->session()->put('namapenulis', $namapenulis);
        return view('manager.laporan.data_berdasarkan_penulis')
                ->with('namapenulis', $namapenulis)
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataBukuPerpenulis(Request $req){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $namapenulis = $req->session()->get('namapenulis', null);
        $penulis = $data->DataPerPenulisAll($namapenulis);
        $data = json_decode($penulis);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.cetak_data_berdasarkan_penulis')
                ->with('namapenulis', $namapenulis)
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function IndexBukuPerPenjualan(Request $req){
        $laporan = new Laporan;
        $inputan = new Inputan;
        $template = $laporan->Template();
        $penjualan = $laporan->Penjualan();
        $data = json_decode($penjualan);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.buku_yang_sering_terjual')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataBukuPenjualanMax(Request $req){
        $laporan = new Laporan;
        $inputan = new Inputan;
        $template = $laporan->Template();
        $penjualan = $laporan->Penjualan();
        $data = json_decode($penjualan);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.cetak_sering_terjual')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function IndexBukuPerTidakAdaPenjualan(Request $req){
        $laporan = new Laporan;
        $inputan = new Inputan;
        $template = $laporan->Template();
        $penjualan = $laporan->TanpaPenjualan();
        $data = json_decode($penjualan);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.buku_tidak_terjual')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataBukuPenjualanMin(Request $req){
        $laporan = new Laporan;
        $inputan = new Inputan;
        $template = $laporan->Template();
        $penjualan = $laporan->TanpaPenjualan();
        $data = json_decode($penjualan);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.cetak_buku_tidak_terjual')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function DataPasokBuku(Request $req){
        $laporan = new Laporan;
        $tanggal = Carbon::now();
        $dateakhir = $tanggal->toDateString();
        $date = $tanggal->subDays(29);
        $dateawal = $date->toDateString();
        $datapasok = $laporan->DataPasok();
        $template = $laporan->Template();
        $data = json_decode($datapasok);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.pasok_buku_distributor')
                ->with('data', $data)
                ->with('dateakhir', $dateakhir)
                ->with('dateawal', $dateawal)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CariDataPasokBuku(Request $req){
        $laporan = new Laporan;
        $dateawal = $req['tawal'];
        $dateakhir = $req['takhir'];
        $datapasok = $laporan->DataPasokPerTanggal($dateakhir,$dateawal);
        $template = $laporan->Template();
        $data = json_decode($datapasok);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        $req->session()->put('dateawal', $dateawal);
        $req->session()->put('dateakhir', $dateakhir);
        return view('manager.laporan.pasok_buku_distributor')
                ->with('data', $data)
                ->with('dateakhir', $dateakhir)
                ->with('dateawal', $dateawal)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataPasokBuku(Request $req){
        $laporan = new Laporan;
        $dateawal = $req->session()->get('dateawal', null);
        $dateakhir = $req->session()->get('dateakhir', null);
        $datapasok = $laporan->DataPasokPerTanggal($dateakhir,$dateawal);
        $template = $laporan->Template();
        $data = json_decode($datapasok);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        $req->session()->put('dateawal', $dateawal);
        $req->session()->put('dateakhir', $dateakhir);
        return view('manager.laporan.cetak_pasok_distributor')
                ->with('data', $data)
                ->with('dateakhir', $dateakhir)
                ->with('dateawal', $dateawal)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function IndexBukuPerdistributor(Request $req){
        $data = new Inputan;
        $distributor = $data->DataPerDistributor();
        $data = json_decode($distributor);
        return view('manager.laporan.input_data_berdasarkan_distributor')
                ->with('data', $data);
    }
    public function DataBukuPerdistributor(Request $req){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $iddistributor = $req['iddistributor'];
        $namadistributor = $data->DataPerDistributorid($iddistributor);
        $distributor = $data->DataPerDistributorAll();
        $data = json_decode($distributor);  
        $tmp = json_decode($template);
        $nama = json_decode($namadistributor);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        $req->session()->put('iddistributor', $iddistributor);
        $req->session()->put('namadistributor', $namadistributor);
        return view('manager.laporan.data_berdasarkan_distributor')
                ->with('nama', $nama)
                ->with('iddistributor', $iddistributor)
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataBukuPerdistributor(Request $req){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $iddistributor = $req->session()->get('iddistributor', null);
        $namadistributor = $req->session()->get('namadistributor', null);
        $distributor = $data->DataPerDistributorAll();
        $data = json_decode($distributor);  
        $tmp = json_decode($template);
        $nama = json_decode($namadistributor);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('manager.laporan.cetak_data_distributor')
                ->with('nama', $nama)
                ->with('iddistributor', $iddistributor)
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
}
