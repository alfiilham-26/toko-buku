@extends('layout.template')
@section('title','Cetak Data Buku Berdasarkan Penulis')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Laporan Semua Buku Berdasarkan Penulis</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Laporan Semua Buku Berdasarkan Penulis</strong>
                        </li>
                    </ol>
                </div>              
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content p-xl">
                    <form action="/laporan-data-buku-penulis/penulis" method="POST">
                        @csrf
                            <label>Nama Penulis :</label>
                            <div class="col-sm-12 p-0"><select class="form-control m-b" name="namapenulis">
                            @foreach($data as $data)
                                <option value={{$data->penulis}}>{{$data->penulis}}</option>
                            @endforeach
                                </select>
                            </div>
                        <div class="">
                            <input class="btn btn-primary" type="submit" name=cari value=Cari>  
                        </div>
                    </form>
                </div>
            </div>
@endsection
@section('script')
@endsection