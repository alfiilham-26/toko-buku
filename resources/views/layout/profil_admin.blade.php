@extends('layout.template')

@section('title','Profil')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Profil Manager</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Profil Manager</strong>
                        </li>
                    </ol>
                </div>              
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content p-xl">
                    <form action="/ubah-data-admin" method="POST">
                        @csrf
                        <label>Nama :</label>
                        <div class="form-group">
                            <input type="text" name="nama"  value="{{$data->nama}}" required
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
                        <label>status :</label>
                        <div class="form-group">
                            <input type="text" name="status"  value="{{$data->status}}" required
                                class="form-control">
                        </div>
                        <label>username :</label>
                        <div class="form-group">
                            <input type="text" name="username"  value="{{$data->username}}" required
                                class="form-control">
                        </div>
                        <label>password :</label>
                        <div class="form-group">
                            <input type="text" name="password"  value="{{$data->password}}" required
                                class="form-control">
                        </div>
                        <label>akses :</label>
                        <div class="form-group">
                            <input type="text" name="akses"  value="{{$data->akses}}" required
                                class="form-control">
                        </div>
                        <div class="">
                            <input class="btn btn-primary" type="submit" name=Ubah value=Ubah>  
                        </div>
                    </form>
                </div>
            </div>
@endsection
@section('script')
@endsection