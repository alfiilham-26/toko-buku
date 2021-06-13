@extends('layout.cetak_template')
@section('title','Cetak Data Buku')

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
                                <h2 class="text-center">Laporan Semua Data Buku</h2>
                            </address>
                        </div>
                     @endforeach
                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Buku</th>
                                        <th>Judul</th>
                                        <th>No ISBN</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Stok</th>
                                        <th>Harga Pokok</th>
                                        <th>Harga Jual</th>
                                        <th>Diskon</th>
                                        <th>PPN</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach($data as $data)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->noisbn}}</td>
                                        <td>{{$data->penulis}}</td>
                                        <td>{{$data->penerbit}}</td>
                                        <td>{{$data->tahun}}</td>
                                        <td>{{$data->stok}}</td>
                                        <td>{{$data->harga_pokok}}</td>
                                        <td>{{$data->harga_jual}}</td>
                                        <td>{{$data->ppn}}%</td>
                                        <td>{{$data->diskon}}%</td>
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