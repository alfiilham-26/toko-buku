@extends('layout.template_manager')
@section('title','Profil Perusahaan')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Profil Perusahaan</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Profil Perusahaan</strong>
                        </li>
                    </ol>
                </div>              
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content p-xl">
                    <form action="/manager/data-penjualan-perfaktur" method="POST">
                        @csrf
                        <label>Nama Perusahaan :</label>
                        <div class="form-group">
                            <input type="text" name="namaperusahaan"  value="{{$data->nama_perusahaan}}" required
                                class="form-control">
                        </div>
                        <label>Alamat :</label>
                        <div class="form-group">
                            <input type="text" name="alamat"  value="{{$data->alamat}}" required
                                class="form-control">
                        </div>
                        <label>No Telpon :</label>
                        <div class="form-group">
                            <input type="text" name="notlpn"  value="{{$data->no_tlpn}}" required
                                class="form-control">
                        </div>
                        <label>Web :</label>
                        <div class="form-group">
                            <input type="text" name="web"  value="{{$data->web}}" required
                                class="form-control">
                        </div>
                        <label>Email :</label>
                        <div class="form-group">
                            <input type="text" name="email"  value="{{$data->email}}" required
                                class="form-control">
                        </div>
                        <label>Logo Laporan :</label>
                        <div class="form-group">
                            <input type="file" name="logo"  value="{{$data->logo}}" required
                                class="form-file-input">
                        </div>
                        <div class="">
                            <input class="btn btn-primary" type="button" name=Ubah value=Ubah>  
                        </div>
                    </form>
                </div>
            </div>
@endsection
@section('script')
@endsection