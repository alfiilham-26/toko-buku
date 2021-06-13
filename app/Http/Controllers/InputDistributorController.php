<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inputan as Inputan;
use Ramsey\Uuid\Uuid;

class InputDistributorController extends Controller
{
    public function Index(Request $request){
        $data = new Inputan;
        $response = $data->InputDistributorIndex();
        $data = json_decode($response);
        return view('admin.inputan.Input_distributor')->with('data', $data);;
    }
    public function add(Request $req){
        $data = new Inputan;
        $uuid = Uuid::uuid4()->toString();
        $nama = $req['nama'];
        $alamat = $req['alamat'];
        $notlpn = $req['notlpn'];
        $payload = [
            'id_distributor' => $uuid,
            'nama_distributor' => $nama,
            'alamat' => $alamat,
            'no_tlpn' => $notlpn,
        ];
        $response = $data->InputDistributoradd($payload);
        if($response == 'true'){
            return redirect('/input-distributor');
        }
    }
    public function edit(Request $req){
        $data = new Inputan;
        $id = $req['id'];
        $nama = $req['nama'];
        $alamat = $req['alamat'];
        $notlpn = $req['notlpn'];
        $payload = [
            'nama_distributor' => $nama,
            'alamat' => $alamat,
            'no_tlpn' => $notlpn,
        ];
        $response = $data->InputDistributoredit($payload,$id);
        if($response == '1'){
            return redirect('/input-distributor');
        }
    }

    public function delete(Request $req, $id_distributor){
        $data = new Inputan;
        $response = $data->InputDistributordelete($id_distributor);
        if($response == '1'){
            return redirect('/input-distributor');
        }
    }
}
