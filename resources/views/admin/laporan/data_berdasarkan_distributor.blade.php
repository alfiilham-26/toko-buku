@extends('layout.template')
@section('title','Cetak Data Buku Berdasarkan Distributor')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Laporan Semua Buku Berdasarkan Distributor</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Laporan Semua Buku Berdsarkan Penulis Berdasarkan Distributor</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="/laporan-data-buku-distributor/distributor/cetak" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Laporan </a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                    <div class="ibox-content p-xl">
                    @foreach($nama as $nama)
                    <?php $nama = $nama->nama_distributor?>
                    @endforeach
                    @foreach($tmp as $tmp)
                        <div class="col-lg-12">
                        <h1>{{$tmp->nama_perusahaan}}</h1>
                            <address>
                                <strong>Rostik, Inc.</strong><br>
                                {{$tmp->alamat}}<br>
                                {{$tmp->no_tlpn}}<br>
                                {{$tmp->email}}<br>
                                {{$tmp->web}}
                                <h2 class="text-center">Laporan Semua Data Buku Berdasarkan Distributor</h2>
                                <h3 class="text-center">Distributor : {{$nama}}</h3>
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
                                    @if($data->id_distributor === $iddistributor)
                                    <?php
                                    $jual_rupiah = "Rp " . number_format($data->harga_jual,2,',','.');
                                    $pokok_rupiah = "Rp " . number_format($data->harga_pokok,2,',','.');
                                    ?>  
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->noisbn}}</td>
                                        <td>{{$data->penulis}}</td>
                                        <td>{{$data->penerbit}}</td>
                                        <td>{{$data->tahun}}</td>
                                        <td>{{$data->stok}}</td>
                                        <td>{{$pokok_rupiah}}</td>
                                        <td>{{$jual_rupiah}}</td>
                                        <td>{{$data->ppn}}%</td>
                                        <td>{{$data->diskon}}%</td>
                                    </tr>  
                                    <?php
                                    $no++;
                                    ?>
                                    @endif
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
@section('script')
@endsection