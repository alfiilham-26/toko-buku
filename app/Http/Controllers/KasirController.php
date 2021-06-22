<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Inputan as Inputan;
use App\Models\Laporan as Laporan;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;

class KasirController extends Controller
{
    public function index(Request $req){
        $dataa = new Inputan;
        $kode = $dataa->KodeFaktur();
        $response = $dataa->InputBukuIndex();
        $data = json_decode($response);
        return view('kasir.inputan.input_judul')->with('data', $data)->with('kode',$kode);
    }
    public function GetData($id){
        $dataa = new Inputan;
        $response = $dataa->DataBukuGet($id);
        foreach($response as $response){
        }
        $newdata = json_encode($response);
        return $newdata;
    }
    public function Keranjang(Request $req){
        $dataa = new Inputan;
        $kode = $req['kode'];
        $id = $req['id'];
        $harga = $req['harga'];
        $jumlah = $req['jumlah'];
        $total = $req['total'];
        if($total == 0){
            return redirect()->back();
        }
        $cleantotal = preg_replace('/\D/','',$total);
        $payload = [
            'id_buku' => $id,
            'jumlah_beli' => $jumlah,
            'total_harga' => $cleantotal,
        ];
        $response = $dataa->DataBukuGet($id);
        foreach($response as $response){}
        if($response->stok >= $jumlah){
            $response = $dataa->InputPenjualan($payload);
            if($response == 'true'){
                $response = $dataa->GetPenjualan();
                $keranjang = json_decode($response);
                $response = $dataa->InputBukuIndex();
                $data = json_decode($response);
                return view('kasir.inputan.data_penjualan')
                    ->with('data', $data)
                    ->with('kode',$kode)
                    ->with('keranjang', $keranjang);
            }
        }
        return redirect()->back();
        
    }
    public function Delete($id){
        $data = new Inputan;
        $response = $data->InputPenjualanDelete($id);
        if($response > 0){
            return redirect('penjualan/keranjang/delete');
        }
    }
    public function NewKeranjang(Request $req){
        $dataa = new Inputan;
        $response = $dataa->GetPenjualan();
        if($response->isNotEmpty()){   
            $keranjang = json_decode($response);
            $response = $dataa->InputBukuIndex();
            $data = json_decode($response);
            $kode = $dataa->KodeFaktur();
            return view('kasir.inputan.data_penjualan')
                ->with('data', $data)
                ->with('kode',$kode)
                ->with('keranjang', $keranjang);
        }
        return redirect('penjualan');
    }
    public function Checkout(Request $req){
        $data = new Inputan;
        $bayar = $req['bayar'];
        $kembalian = $req['kembalian'];
        $tanggal = $req['tanggal'];
        $kode = $req['kode'];
        $req->session()->put('kode', $kode);
        $user = $req->session()->get('user', null);
        foreach($user as $user){
        }
        $userid = $user->id_user;
        $response = $data->GetPenjualan();
        foreach($response as $response){
            $id = $response->id_buku;
            $jumlah = $response->jumlah_beli;
            $ppn = $response->ppn * $response->jumlah_beli;
            $diskon = $response->diskon * $response->jumlah_beli;
            $hargadiskon = $response->total_harga * $diskon / 100;
            $hargappn = ($response->total_harga - $hargadiskon) * $ppn / 100;
            $total = $response->total_harga - $hargadiskon + $hargappn;
            $payload = [
                'id_penjualan' => $kode,
                'id_buku' => $id,
                'id_kasir' => $userid,
                'jumlah_beli' => $jumlah,
                'bayar' => $bayar,
                'kembalian' => $kembalian,
                'total_harga' => $total,
                'tanggal' => $tanggal, 
            ];
            $response = $data->Checkout($payload);
        }
        if($response == 'true'){
            $response = $data->HapusTmp();
            if($response > 0){
                return redirect('/penjualan/keranjang/struk');
            }
        }
    }
    public function Struk(Request $req){
        $dataa = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $tmp = json_decode($template);
        $kode = $req->session()->get('kode', null);
        $response = $dataa->DataPenjualanGetKode($kode);
        $data = json_decode($response);
        return view('kasir.inputan.cetak_struk')
            ->with('data', $data)
            ->with('tmp', $tmp);
    }
    public function CetakStruk(Request $req){
        $dataa = new Inputan;
        $laporan = new Laporan;
        $template = $laporan->Template();
        $tmp = json_decode($template);
        $kode = $req->session()->get('kode', null);
        $response = $dataa->DataPenjualanGetKode($kode);
        $data = json_decode($response);
        $tanggal = Carbon::now();
        $date = $tanggal->toDateString();
        return view('kasir.inputan.cetak_struk_akhir')
            ->with('data', $data)
            ->with('date', $date)
            ->with('tmp', $tmp);
    }
    public function GetProfilKasir(Request $req){
        $user = $req->session()->get('user', null);
        $template = "manager";
        $data = json_decode($user);
        foreach($data as $data){}
        $id = $data->id_user;
        $req->session()->put('id' ,$id);
        return view ('layout.profil_kasir')
               ->with('data', $data);
    }
    public function UbahProfilKasir(Request $req){
        $data = new Inputan;
        $id=$req->session()->get('id', null);
        $nama = $req['nama'];
        $alamat = $req['alamat'];
        $notlpn = $req['notlpn'];
        $status = $req['status'];
        $username= $req['username'];
        $password = $req['password'];
        $akses = $req['akses'];
        $payload=[
            'nama' => $nama,
            'alamat' => $alamat,
            'no_tlpn' => $notlpn,
            'status' => $status,
            'username' => $username,
            'password' => $password,
            'akses' => $akses,
        ];
        $response = $data->UbahProfil($payload,$id);
        if($response == '1'){
            $data = new Inputan;
            $response = $data->GetProfilId($id);
            $req->session()->put('user', $response);
            return redirect('/Dashboard/kasir');
        }
    }
}
