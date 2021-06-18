<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inputan as Inputan;
use App\Models\Laporan as Laporan;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class LaporanKasirController extends Controller
{
    public function InputFaktur(Request $req){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $response = $laporan->DataPenjualanFaktur();
        $data = json_decode($response);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('kasir.laporan.input_faktur')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function DataPerFaktur(Request $req){
        $data = new Inputan;
        $laporan = new Laporan;
        $kode = $req['idfaktur'];
        $template = $laporan->Template();
        $response = $data->DataPenjualanGetKode($kode);
        $data = json_decode($response);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        $req->session()->put('kode', $kode);
        return view('kasir.laporan.data_perfaktur')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataPerFaktur(Request $req){
        $data = new Inputan;
        $laporan = new Laporan;
        $kode = $req->session()->get('kode', null);
        $template = $laporan->Template();
        $response = $data->DataPenjualanGetKode($kode);
        $data = json_decode($response);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('kasir.laporan.cetak_data_perfaktur')
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function DataPenjualan(){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $response = $laporan->DataPenjualanAll();
        $transaksi = $laporan->DataPenjualanSum();
        $data = json_decode($response);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('kasir.laporan.data_penjualan')
                ->with('transaksi', $transaksi)
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataPenjualan(){
        $data = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $response = $laporan->DataPenjualanAll();
        $transaksi = $laporan->DataPenjualanSum();
        $data = json_decode($response);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('kasir.laporan.cetak_data_penjualan')
                ->with('transaksi', $transaksi)
                ->with('data', $data)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function DataPenjualanBuku(Request $req){
        $laporan = new Laporan;
        $tanggal = Carbon::now();
        $dateakhir = $tanggal->toDateString();
        $date = $tanggal->subDays(29);
        $dateawal = $date->toDateString();
        $datapenjualan = $laporan->DataPenjualanTanggalIndex();
        $template = $laporan->Template();
        $data = json_decode($datapenjualan);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        $transaksi = $laporan->DataPenjualanPerTanggalSum($dateakhir,$dateawal);
        $req->session()->put('dateawal', $dateawal);
        $req->session()->put('dateakhir', $dateakhir);
        return view('kasir.laporan.data_pertanggal')
                ->with('data', $data)
                ->with('transaksi', $transaksi)
                ->with('dateakhir', $dateakhir)
                ->with('dateawal', $dateawal)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CariDataPenjualanBuku(Request $req){
        $laporan = new Laporan;
        $dateawal = $req['tawal'];
        $dateakhir = $req['takhir'];
        $datapenjualan = $laporan->DataPenjualanPerTanggal($dateakhir,$dateawal);
        $template = $laporan->Template();
        $data = json_decode($datapenjualan);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        $req->session()->put('dateawal', $dateawal);
        $req->session()->put('dateakhir', $dateakhir);
        $transaksi = $laporan->DataPenjualanPerTanggalSum($dateakhir,$dateawal);
        return view('kasir.laporan.data_pertanggal')
                ->with('data', $data)
                ->with('transaksi', $transaksi)
                ->with('dateakhir', $dateakhir)
                ->with('dateawal', $dateawal)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
    public function CetakDataPenjualanBuku(Request $req){
        $laporan = new Laporan;
        $dateawal = $req->session()->get('dateawal', null);
        $dateakhir = $req->session()->get('dateakhir', null);
        $datapenjualan = $laporan->DataPenjualanPerTanggal($dateakhir,$dateawal);
        $template = $laporan->Template();
        $data = json_decode($datapenjualan);
        $tmp = json_decode($template);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        $transaksi = $laporan->DataPenjualanPerTanggalSum($dateakhir,$dateawal);
        return view('kasir.laporan.cetak_data_pertanggal')
                ->with('data', $data)
                ->with('transaksi', $transaksi)
                ->with('dateakhir', $dateakhir)
                ->with('dateawal', $dateawal)
                ->with('tmp', $tmp)
                ->with('date', $date);
    }
}
