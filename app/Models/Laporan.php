<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Laporan extends Model
{
    public function Template(){
        return $perusahan = DB::table('tbl_setting_lap')->get();
    }
    public function Penjualan(){
        return $perusahan = DB::table('tbl_buku')->where('total_penjualan','>',0 )->get();
    }
    public function TanpaPenjualan(){
        return $perusahan = DB::table('tbl_buku')->where('total_penjualan','=',0 )->get();
    }
    public function DataPasok(){
        $tanggal = Carbon::now();
        $dateakhir = $tanggal->toDateString();
        $date = $tanggal->subDays(29);
        $dateawal = $date->toDateString();
        return $data = DB::table('tbl_pasok')
        ->leftJoin('tbl_distributor', 'tbl_distributor.id_distributor', '=', 'tbl_pasok.id_distributor')
        ->leftJoin('tbl_buku', 'tbl_buku.id', '=', 'tbl_pasok.id_buku')
        ->whereBetween('tanggal', [$dateawal, $dateakhir])
        ->get();
    }
    public function DataPasokPerTanggal($dateakhir,$dateawal){
        return $data = DB::table('tbl_pasok')
        ->leftJoin('tbl_distributor', 'tbl_distributor.id_distributor', '=', 'tbl_pasok.id_distributor')
        ->leftJoin('tbl_buku', 'tbl_buku.id', '=', 'tbl_pasok.id_buku')
        ->whereBetween('tanggal', [$dateawal, $dateakhir])
        ->get();
    }
}
