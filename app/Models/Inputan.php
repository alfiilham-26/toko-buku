<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inputan extends Model
{
    public function InputDistributorIndex(){
        return $data = DB::table('tbl_distributor')->get();
    }
    public function InputDistributoradd($payload){
        return $data = DB::table('tbl_distributor')->insert($payload);
    }
    public function InputDistributoredit($payload,$id){
        return $data = DB::table('tbl_distributor')->where(['id_distributor'=> $id])->update($payload);
    }
    public function InputDistributordelete($id_distributor){
        return $data = DB::table('tbl_distributor')->where(['id_distributor'=> $id_distributor])->delete();
    }
    public function InputBukuIndex(){
        return $data = DB::table('tbl_buku')->get();
    }
    public function InputBukuadd($payload){
        return $data = DB::table('tbl_buku')->insert($payload);
    }
    public function InputBukuedit($payload,$id){
        return $data = DB::table('tbl_buku')->where(['id'=> $id])->update($payload);
    }
    public function InputBukudelete($id){
        return $data = DB::table('tbl_buku')->where(['id'=> $id])->delete();
    }
    public function Kode(){
        $kode = DB::table('tbl_buku')->max('id');
    	$addNol = '';
    	$kode = str_replace("BQU", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000000000000000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00000000000000";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0000000000000";
    	}

    	$kodeBaru = "BQU".$addNol.$incrementKode;
    	return $kodeBaru;
    }
    public function InputPasokBukuIndex(){
        return $data = DB::table('tbl_pasok')
        ->leftJoin('tbl_distributor', 'tbl_distributor.id_distributor', '=', 'tbl_pasok.id_distributor')
        ->leftJoin('tbl_buku', 'tbl_buku.id', '=', 'tbl_pasok.id_buku')
        ->get();
    }
    public function InputPasokBukuadd($payload){
        return $data = DB::table('tbl_pasok')->insert($payload);
    }
    public function InputPasokBukudelete($id_pasok){
        return $data = DB::table('tbl_pasok')->where(['id_pasok'=> $id_pasok])->delete();
    }
    public function DataPerPenulis(){
        return $data = DB::table('tbl_buku')->select('penulis')->get();
    }
    public function DataPerPenulisAll($namapenulis){
        return $data = DB::table('tbl_buku')->where(['penulis' => $namapenulis])->get();
    }
    public function DataPerDistributor(){
       return  $data = DB::table('tbl_distributor')
                ->select('nama_distributor','id_distributor')
                ->get();
    }
    public function DataPerDistributorid($iddistributor){
        return  $data = DB::table('tbl_distributor')->select('nama_distributor')->where(['id_distributor' => $iddistributor])->get();
     }
    public function DataPerDistributorAll(){
        return $data = DB::table('tbl_pasok')
        ->leftJoin('tbl_distributor', 'tbl_distributor.id_distributor', '=', 'tbl_pasok.id_distributor')
        ->leftJoin('tbl_buku', 'tbl_buku.id', '=', 'tbl_pasok.id_buku')
        ->get();
    }
    public function KodeFaktur(){
        $kode = DB::table('tbl_penjualan')->max('id_penjualan');
    	$addNol = '';
    	$kode = str_replace("FK", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000000000000000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00000000000000";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0000000000000";
    	}

    	$kodeBaru = "FK".$addNol.$incrementKode;
    	return $kodeBaru;
    }
    public function DataBukuGet($id){
        return $data = DB::table('tbl_buku')->where(['id'=> $id])->get();
    }
    public function InputPenjualan($payload){
        return $data = DB::table('tbl_tmp_penjualan')->insert($payload);
    }
    public function GetPenjualan(){
        return $data = DB::table('tbl_tmp_penjualan')
        ->leftJoin('tbl_buku', 'tbl_buku.id', '=', 'tbl_tmp_penjualan.id_buku')
        ->get();
    }
    public function InputPenjualanDelete($id){
        return $data = DB::table('tbl_tmp_penjualan')->where(['id_buku'=> $id])->delete();
    }
    public function CheckOut($payload){
        return $data = DB::table('tbl_penjualan')->insert($payload);
    }
    public function HapusTmp(){
        return $data = DB::table('tbl_tmp_penjualan')->delete();
    }
    public function DataPenjualanGetKode($kode){
        return $data = DB::table('tbl_penjualan')
            ->where(['id_penjualan'=> $kode])
            ->leftJoin('tbl_buku', 'tbl_buku.id', '=', 'tbl_penjualan.id_buku')
            ->get();
    }
    public function UbahProfil($payload,$id){
        return $data = DB::table('tbl_user')->where(['id_user'=>$id])->update($payload);
    }
}
