@extends('layout.template_manager')
@section('title','Data Buku Yang Tidak Terjual')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Laporan Buku Yang Tidak Terjual</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Laporan Buku Yang Tidak Terjual</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="/manager/laporan-buku-tidak-terjual/cetak" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Laporan </a>
                    </div>
                </div>
            </div>
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
                                <h2 class="text-center">Laporan Buku Yang Tidak Terjual</h2>
                            </address>
                        </div>
                     @endforeach
                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>No ISBN</th>
                                        <th>Penulis</th>
                                        <th>Harga Jual</th>
                                        <th>Total Jumlah Beli</th>
                                        <th>Total Transaksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach($data as $data)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->noisbn}}</td>
                                        <td>{{$data->penulis}}</td>
                                        <td>{{$data->harga_jual}}</td>  
                                        <td>{{$data->jumlah_penjualan}}</td>  
                                        <td>{{$data->total_penjualan}}</td>                                                           
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
@section('script')
@endsection