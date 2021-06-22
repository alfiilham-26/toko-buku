@extends('layout.template_kasir')
@section('title','Cetak Data Penjualan Pertanggal')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-4">
                    <h2>Cetak Data Penjualan Pertanggal</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Cetak Data Penjualan Pertanggal</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="/penjualan-pertanggal/cetak" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Laporan </a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                    <div class="ibox-content p-xl">
                    <form action="{{ url('/penjualan-pertanggal/cari') }}" method="POST">
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
                                <h2 class="text-center">Struk Penjualan Pertanggal</h2>
                                <h3 class="text-center">{{$dateawal}} Hingga {{$dateakhir}}</h3>
                            </address>
                        </div>
                     @endforeach
                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Penjualan</th>
                                        <th>Judul</th>
                                        <th>Jumlah Beli</th>
                                        <th>Harga Satuan</th>
                                        <th>PPN</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                        <th>Tanggal Transaksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $grandtotal = 0;
                                    $jumlahbuku = 0;
                                    $grandtotal_rupiah =0;
                                    ?>
                                    @foreach($data as $data)
                                    <?php
                                    $jual_rupiah = "Rp " . number_format($data->harga_jual,2,',','.');
                                    ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$data->id_penjualan}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->jumlah_beli}}</td>
                                        <td>{{$jual_rupiah}}</td>
                                        <td>{{$data->ppn}}%</td>
                                        <td>{{$data->diskon}}%</td>
                                        <?php
                                         $hasil_rupiah = "Rp " . number_format($data->total_harga,2,',','.');
                                         $grandtotal = $grandtotal + $data->total_harga;
                                         $grandtotal_rupiah = "Rp " . number_format($grandtotal,2,',','.');
                                         $jumlah = $data->jumlah_beli;
                                         $jumlahbuku = $jumlahbuku + $jumlah;
                                        ?>   
                                        <td>{{$hasil_rupiah}}</td>
                                        <td>{{$data->tanggal}}</td>                                                            
                                    </tr>                                      
                                    <?php
                                    $no++;
                                    ?>
                                    @endforeach              
                                    </tbody>
                                    <tr>
                                        <th colspan="2">{{$transaksi}} Transaksi</th>
                                        <th class="text-right">Jumlah</th>
                                        <th class="text-right">{{$jumlahbuku}}</th>
                                        <th colspan="3" class="text-right">Grand Total</th>
                                        <th class="text-left">{{$grandtotal_rupiah}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Tanggal Cetak :</th>
                                        <th class="text-right">{{$date}}</th>
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