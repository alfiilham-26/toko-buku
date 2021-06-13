@extends('layout.template')
@section('title','Input Pasok Buku')

@section('content')
 <!--tambah form Modal -->
 <div class="modal fade text-left " id="TambahForm" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ url('/input-pasokbuku/tambah') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Nama Distributor :</label>
                                <div class="col-sm-12 p-0"><select class="form-control m-b" name="id_distributor">
                                    @foreach($distributor as $distributor)
                                    <option value={{$distributor->id_distributor}}>{{$distributor->nama_distributor}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <label>Nama Buku :</label>
                                <div class="col-sm-12 p-0"><select class="form-control m-b" name="id_buku">
                                    @foreach($buku as $buku)
                                    <option value={{$buku->id}}>{{$buku->judul}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <label>Jumlah</label>
                                <div class="form-group">
                                    <input type="text" name="jumlah" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-primary" type="submit" name=simpan value=SIMPAN>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--edit form Modal -->
 <!-- <div class="modal fade text-left " id="EditForm" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ url('/input-distributor/edit') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-primary" type="submit" name=ubah value=UBAH>  
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->

<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Tabel Input Pasok Buku</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Inputan</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Input Pasok Buku</a>
                </li>
            </ol>
        </div>
    </div>
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div>
                        <a herf="" class="btn btn-primary tambah text-white">Tambah Pasok Buku</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Distributor</th>
                            <th>Id Buku</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        ?>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$data->id_distributor}}</td>
                            <td>{{$data->id_buku}}</td>
                            <td>{{$data->jumlah}}</td>
                            <td>{{$data->tanggal}}</td>
                            <td>
                                <a href="/input-pasokbuku/{{$data->id_pasok}}/hapus" class="btn btn-danger hapus">Hapus</a>
                                <!-- <a class="btn btn-warning edit text-white" data-iddistributor="{{$data->id_distributor}}" data-idbuku="{{$data->id_buku}}" data-jumlah="{{$data->jumlah}}"  data-id="{{$data->id_pasok}}" data-tgl="{{$data->tanggal}}">Edit</a> -->
                            </td>
                        </tr>
                        <?php
                        $no++;
                        ?>
                        @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
</div>
@endsection
@section('script')
<script>
        $('.tambah').on('click', function() {
        $('#TambahForm').modal('show');
    });
</script>
<script>
    //     $('.edit').on('click', function() {
    //     const id = $(this).data("iddistributor");
    //     const id = $(this).data("nama");
    //     const alamat = $(this).data("alamat");
    //     const notlpn = $(this).data("notlpn");
    //     $('.id').val(id);
    //     $('.nama').val(nama);
    //     $('.alamat').val(alamat);
    //     $('.notlpn').val(notlpn);
    //     $('#EditForm').modal('show');
    // });
</script>
@endsection