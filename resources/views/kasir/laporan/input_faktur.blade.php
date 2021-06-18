@extends('layout.template_kasir')
@section('title','Data Berdasarkan Faktur')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Data Berdasarkan Faktur</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Other Pages
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Data Berdasarkan Faktur</strong>
                        </li>
                    </ol>
                </div>              
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content p-xl">
                    <form action="/data-penjualan-perfaktur" method="POST">
                        @csrf
                            <label>Nomer Faktur :</label>
                            <div class="col-sm-12 p-0"><select class="form-control m-b" name="idfaktur">
                            @foreach($data as $data)
                                <option value={{$data->id_penjualan}}>{{$data->id_penjualan}}</option>
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