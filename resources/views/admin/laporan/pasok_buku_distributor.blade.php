@extends('layout.template')
@section('title','Cetak Data Pasok Buku')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-4">
                    <h2>Laporan Data Pasok Buku</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Laporan Data Pasok Buku</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="/laporan-buku-tidak-terjual/cetak" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Laporan </a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                    <div class="ibox-content p-xl">
                    <form action="{{ url('/laporan-data-pasok-buku/cari') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <label>Tanggal Awal :</label>
                                <div class="form-group">
                                    <input type="date" name="tawal" value="{{$dateawal}}" required
                                        class="form-control">
                                </div>
                                <div class="form-group ">
                                <label>Tanggal Akhir :</label>
                                    <input type="date" name="takhir" value="{{$dateakhir}}" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-footer">
                                <input class="btn btn-primary" type="submit" name=Cari value=CARI>  
                            </div>
                        </form>
                    </div>
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
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$data->nama_distributor}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->noisbn}}</td>
                                        <td>{{$data->penulis}}</td>
                                        <td>{{$data->penerbit}}</td>
                                        <td>{{$data->harga_jual}}</td>
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
@section('script')
@endsection