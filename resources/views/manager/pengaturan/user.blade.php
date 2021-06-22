@extends('layout.template_manager')
@section('title','Data User')

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
                        <form action="{{ url('manager/data-user/tambah') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Nama :</label>
                                <div class="form-group">
                                    <input type="text" name="nama" required
                                        class="form-control">
                                </div>
                                <label>Alamat :</label>
                                <div class="form-group">
                                    <input type="text" name="alamat" required
                                        class="form-control">
                                </div>
                                <label>Nomor Telepon :</label>
                                <div class="form-group">
                                    <input type="text" name="notlpn" required
                                        class="form-control">
                                </div>
                                <label>status :</label>
                                <div class="form-group">
                                <select class="form-control m-b" name="status">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="manager">Manager</option>
                                </select>
                                </div>
                                <label>akses :</label>
                                <select class="form-control m-b" name="akses">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="manager">Manager</option>
                                </select>
                                <label>username :</label>
                                <div class="form-group">
                                    <input type="text" name="username" required
                                        class="form-control username">
                                </div>
                                <label>password :</label>
                                <div class="form-group">
                                    <input type="text" name="password" required
                                        class="form-control password">
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
 <div class="modal fade text-left " id="EditForm" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Edit Form </h4>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ url('manager/data-user/edit') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="id" required
                                    class="id">
                                <input type="hidden" name="username" required
                                    class="username">
                                <input type="hidden" name="password" required
                                    class="password">
                                <label>Nama :</label>
                                <div class="form-group">
                                    <input type="text" name="nama" required
                                        class="form-control nama">
                                </div>
                                <label>Alamat :</label>
                                <div class="form-group">
                                    <input type="text" name="alamat" required
                                        class="form-control alamat">
                                </div>
                                <label>Nomor Telepon</label>
                                <div class="form-group">
                                    <input type="text" name="notlpn" required
                                        class="form-control notlpn">
                                </div>
                                <label>status :</label>
                                <div class="form-group">
                                <select class="form-control m-b status" name="status">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="manager">Manager</option>
                                </select>
                                </div>
                                <label>akses :</label>
                                <select class="form-control m-b akses" name="akses">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-primary" type="submit" name=ubah value=UBAH>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Tabel User</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Tabel User</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Input User</a>
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
                    </div>
                    <div>
                        <a herf="" class="btn btn-primary tambah text-white">Tambah User</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepone</th>
                            <th>Status</th>
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        ?>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->no_tlpn}}</td>
                            <td>{{$data->status}}</td>
                            <td>{{$data->akses}}</td>
                            <td>
                                <a href="/manager/data-user/{{$data->id_user}}/delete" class="btn btn-danger hapus">Hapus</a>
                                <a class="btn btn-warning edit text-white" data-id="{{$data->id_user}}" data-nama="{{$data->nama}}" data-alamat="{{$data->alamat}}"  data-notlpn="{{$data->no_tlpn}}" data-status="{{$data->status}}" data-akses="{{$data->akses}}" data-username="{{$data->username}}" data-password="{{$data->password}}">Edit</a>
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
        $('.edit').on('click', function() {
        const id = $(this).data("id");
        const nama = $(this).data("nama");
        const alamat = $(this).data("alamat");
        const notlpn = $(this).data("notlpn");
        const status = $(this).data("status");
        const akses = $(this).data("akses");
        const username = $(this).data("username");
        const password = $(this).data("password");
        $('.id').val(id);
        $('.nama').val(nama);
        $('.alamat').val(alamat);
        $('.notlpn').val(notlpn);
        $('.status').val(status);
        $('.akses').val(akses);
        $('.password').val(password);
        $('.username').val(username);
        $('#EditForm').modal('show');
    });
</script>
@endsection