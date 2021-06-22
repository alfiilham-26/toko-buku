@extends('layout.cetak_template')
@section('title','Cetak Data Pasok Buku Distributor')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                    <div class="col-lg-12">
                    <div class="ibox-content p-xl">
                    @foreach($tmp as $tmp)
                        <div class="col-lg-12">
                        <h1>{{$tmp->nama_perusahaan}}</h1>
                            <address>
                                <strong>Rostik, Inc.</strong><br>
                                {{$tmp->alamat}}<br>
                                {{$tmp->no_tlpn}}<br>
                                {{$tmp->email}}<br>
                                {{$tmp->web}}
                                <h2 class="text-center">Laporan Data Pasok Buku</h2>
                                <h3 class="text-center">{{$dateawal}} Hingga {{$dateakhir}}</h3>
                            </address>
                        </div>
                     @endforeach
                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Distributor</th>
                                        <th>Judul</th>
                                        <th>No ISBN</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Diskon</th>
                                        <th>Jumlah Pasok</th>
                                        <th>Tanggal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach($data as $data)
                                    <?php
                                    $jual_rupiah = "Rp " . number_format($data->harga_jual,2,',','.');
                                    ?>        
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$data->nama_distributor}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->noisbn}}</td>
                                        <td>{{$data->penulis}}</td>
                                        <td>{{$data->penerbit}}</td>
                                        <td>{{$jual_rupiah}}</td>
                                        <td>{{$data->stok}}</td>
                                        <td>{{$data->diskon}}</td>
                                        <td>{{$data->jumlah}}</td>
                                        <td>{{$data->tanggal}}</th>
                                    </tr>
                                    <?php
                                    $no++;
                                    ?>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <th colspan="2">Jumlah : {{$no-1}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Di Cetak Tanggal : {{$date}}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
@endsection