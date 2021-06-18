@extends('layout.template_manager')
@section('title','Cetak Struk')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Cetak Struk</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Cetak Struk</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="/manager/cetak/struk/perfaktur" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Struk </a>
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
                                <h2 class="text-center">Struk Penjualan</h2>
                            </address>
                        </div>
                     @endforeach
                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Jumlah Beli</th>
                                        <th>Harga Satuan</th>
                                        <th>PPN</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $grandtotal = 0;
                                    $jumlahbuku = 0;
                                    ?>
                                    @foreach($data as $data)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td>{{$data->jumlah_beli}}</td>
                                        <td>{{$data->harga_jual}}</td>
                                        <td>{{$data->ppn}}%</td>
                                        <td>{{$data->diskon}}%</td>
                                        <?php
                                         $ppn = $data->ppn * $data->jumlah_beli;
                                         $diskon = $data->diskon * $data->jumlah_beli;
                                         $hargadiskon = $data->total_harga * $diskon / 100;
                                         $hargappn = ($data->total_harga - $hargadiskon) * $ppn / 100;
                                         $total = $data->total_harga - $hargadiskon + $hargappn;
                                         $hasil_rupiah = "Rp " . number_format($total,2,',','.');
                                         $grandtotal = $grandtotal + $total;
                                         $grandtotal_rupiah = "Rp " . number_format($grandtotal,2,',','.');
                                         $jumlah = $data->jumlah_beli;
                                         $jumlahbuku = $jumlahbuku + $jumlah;
                                         $bayar_rupiah = "Rp " . number_format($data->bayar,2,',','.');
                                         $kembalian_rupiah = "Rp " . number_format($data->kembalian,2,',','.');
                                        ?>   
                                        <td>{{$hasil_rupiah}}</td>                                                            
                                    </tr>                                      
                                    <?php
                                    $no++;
                                    ?>
                                    @endforeach              
                                    </tbody>
                                    <tr>
                                        <th colspan="2" class="text-right">Jumlah</th>
                                        <th colspan="3" class="text-left">{{$jumlahbuku}}</th>
                                        <th class="text-right">Grand Total</th>
                                        <th class="text-right">{{$grandtotal_rupiah}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5"></th>
                                        <th class="text-right">Bayar</th>
                                        <th class="text-right">{{$bayar_rupiah}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5"></th>
                                        <th class="text-right">Kembalian</th>
                                        <th class="text-right">{{$kembalian_rupiah}}</th>
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