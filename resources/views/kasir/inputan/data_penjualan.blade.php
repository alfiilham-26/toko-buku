@extends('layout.template_kasir')
@section('title','Input Penjualan')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-4">
                    <h2>Input Penjualan</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Input Penjualan</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox-content p-xl">
                        <form action="{{ url('/penjualan/keranjang') }}" method="post">
                            @csrf
                            <div class="form-body">
                                <label>No Faktur :</label>
                                <div class="form-group">
                                    <input type="text" name="kode" readonly value="{{$kode}}" required
                                        class="form-control">
                                </div>
                                <div class="form-group ">
                                <label>Judul :</label>
                                <div class="form-group">
                                <select class="form-control m-b" name="id" id="id" onchange="cek_db()">
                                <option value="">--pilih--</option>
                                @foreach($data as $data)
                                    <option name="id" value={{$data->id}}>{{$data->judul}}</option>
                                @endforeach
                                    </select>
                                </div>
                                <label>Harga :</label>
                                <div class="form-group">
                                    <input type="text" name="harga" id="harga" readonly value="" required
                                        class="form-control">
                                </div>
                                <label>Jumlah Beli:</label>
                                <div class="form-group">
                                    <input type="number" name="jumlah" id="jumlah" onchange="cek_total()" required
                                        class="form-control jumlah">
                                </div>
                                <label>Total :</label>
                                <div class="form-group">
                                    <input type="text total" name="total" id="total" value="" readonly required
                                        class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                    <input class="btn btn-primary" type="submit" name=Tambah value=Tambah>  
                            </div>
                        </form>
                    </div>
                    <div class="ibox-content p-xl mt-3">
                        <div class="table-responsive m-t">
                            <h3>Tabel Penjualan</h3>
                            <form action="penjualan/checkout" method="post">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah Beli</th>
                                        <th>PPN</th>
                                        <th>Diskon</th>
                                        <th>Total Transaksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $grandtotal = 0;
                                        ?>
                                    @foreach($keranjang as $keranjang)
                                    <tr>
                                        <td>{{$keranjang->judul}}</td>
                                        <td>{{$keranjang->harga_jual}}</td>
                                        <td>{{$keranjang->jumlah_beli}}</td>
                                        <td>{{$keranjang->ppn}} %</td>  
                                        <td>{{$keranjang->diskon}} %</td>
                                        <?php
                                         $ppn = $keranjang->ppn * $keranjang->jumlah_beli;
                                         $diskon = $keranjang->diskon * $keranjang->jumlah_beli;
                                         $hargadiskon = $keranjang->total_harga * $diskon / 100;
                                         $hargappn = ($keranjang->total_harga - $hargadiskon) * $ppn / 100;
                                         $total = $keranjang->total_harga - $hargadiskon + $hargappn;
                                         $hasil_rupiah = "Rp " . number_format($total,2,',','.');
                                         $grandtotal = $grandtotal + $total;
                                         $grandtotal_rupiah = "Rp " . number_format($grandtotal,2,',','.');
                                        ?> 
                                        <td>{{$hasil_rupiah}}</td>
                                        <td>
                                        <a href="/penjualan/keranjang/{{$keranjang->id}}" class="btn btn-danger hapus">Hapus</a>
                                        </td>                                                           
                                    </tr>                                      
                                    @endforeach   
                                    <tr>
                                        <td colspan="4"></td>
                                        <td>Grand Total</td>
                                        <td colspan="2" class="text-left" id="grandtotal">{{$grandtotal_rupiah}}</td>
                                    </tr>           
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-content p-xl mt-3">
                        <form action="{{ url('/penjualan/keranjang/checkout') }}" method="post">
                            @csrf
                            <div class="form-body">
                                <label>Bayar:</label>
                                <div class="form-group">
                                    <input type="number" name="bayar" id="bayar" onchange="cek_kembalian()" required
                                        class="form-control jumlah">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="kode" id="kode" value="{{$kode}}"
                                        class="form-control">
                                </div>
                                <label>Kembalian / hutang (Jika min -) :</label>
                                <div class="form-group">
                                    <input type="text" name="kembalian" id="kembalian" value="" readonly required
                                        class="form-control">
                                </div>
                                <label>Tanggal Penjualan :</label>
                                <div class="form-group">
                                    <input type="Date" name="tanggal" id="tanggal" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-footer">
                                    <input class="btn btn-primary" type="submit" name=Tambah value=checkout>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
         $('.cari').on('click', function(){
            $('#CariForm').modal('show')
        });
        function cek_db(){
        var id = $("#id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          type : "GET",
          url : '/penjualan/'+id,
        success: function (newdata){
          var json = newdata,
          obj = JSON.parse(json);
          $('#harga').val(obj.harga_jual);
        }
        });
    }
    function cek_total(){
        var jumlah = $("#jumlah").val();
        var harga = $("#harga").val();
        var total = jumlah * harga;
        $('#total').val(total);
    }
    function cek_kembalian(){
        var grandtotal = {{$grandtotal}};
        var bayar = $("#bayar").val();
        var kembalian = bayar - grandtotal;
        $('#kembalian').val(kembalian);
    }
    </script>
@endsection