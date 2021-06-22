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
                                <label>Total Harga:</label>
                                <div class="form-group">
                                    <input type="text total" name="total" id="total" value="" required readonly
                                        class="form-control">
                                </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                    <input class="btn btn-primary" type="submit" name=Tambah value=Tambah>  
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
          var	number_string = obj.harga_jual.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);       
            if (ribuan) {
                separator = sisa ? ',' : '';
                rupiah += separator + ribuan.join(',');
            }
          $('#harga').val(rupiah);
        }
        });
    }
    function cek_total(){
        var data = $("#harga").val();
        var harga = data.replace(/\D/g, '');
        var jumlah = $("#jumlah").val();
        var total = jumlah * harga;
        var	number_string = total.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);       
            if (ribuan) {
                separator = sisa ? ',' : '';
                rupiah += separator + ribuan.join(',');
            }
        $('#total').val(rupiah);
    }
    </script>
@endsection