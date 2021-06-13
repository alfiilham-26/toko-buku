<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inputan as Inputan;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class InputPasokBukuController extends Controller
{
    public function Index(Request $request){
        $data = new Inputan;
        $buku = $data->InputBukuIndex();
        $distributor = $data->InputDistributorIndex();
        $response = $data->InputPasokBukuIndex();
        $data = json_decode($response);
        $distributor = json_decode($distributor);
        $buku = json_decode($buku);
        return view('admin.tambah.tambah_pasok_buku')
                ->with('data', $data)
                ->with('distributor', $distributor)
                ->with('buku', $buku);
    }
    public function add(Request $req){
        $data = new Inputan;
        $uuid = Uuid::uuid4()->toString();
        $iddistributor = $req['id_distributor'];
        $idbuku = $req['id_buku'];
        $jumlah = $req['jumlah'];
        $time = Carbon::now();
        $tanggal = $time->toDateString();
        $payload = [
            'id_pasok' => $uuid,
            'id_distributor' => $iddistributor,
            'id_buku' => $idbuku,
            'jumlah' => $jumlah,
            'tanggal' => $tanggal,
        ];
        $response = $data->InputPasokBukuadd($payload);
        if($response == 'true'){
            return redirect('/input-pasokbuku');
        }
    }
    public function delete(Request $req, $id_pasok){
        $data = new Inputan;
        $response = $data->InputPasokBukudelete($id_pasok);
        if($response == '1'){
            return redirect('/input-pasokbuku');
        }
    }
}
