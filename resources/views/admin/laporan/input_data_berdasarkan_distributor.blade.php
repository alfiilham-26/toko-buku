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
                            <strong>Laporan Semua Buku Berdasarkan Distributor</strong>
                        </li>
                    </ol>
                </div>              
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content p-xl">
                    <form action="/laporan-data-buku-distributor/distributor" method="POST">
                        @csrf
                            <label>Nama Distributor :</label>
                            <div class="col-sm-12 p-0"><select class="form-control m-b" name="iddistributor">
                            @foreach($data as $data)
                                <option value={{$data->id_distributor}}>{{$data->nama_distributor}}</option>
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