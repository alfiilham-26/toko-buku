@extends('layout.template')
@section('title','Input Buku')

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
                        <form action="{{ url('/input-buku/tambah') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Kode :</label>
                                <div class="form-group">
                                    <input type="text" name="kode" value={{$kode}} readonly
                                        class="form-control">
                                </div>
                                <label>Judul :</label>
                                <div class="form-group">
                                    <input type="text" name="judul" required
                                        class="form-control">
                                </div>
                                <label>No ISBN :</label>
                                <div class="form-group">
                                    <input type="text" name="noisbn" required
                                        class="form-control">
                                </div>
                                <label>Penulis :</label>
                                <div class="form-group">
                                    <input type="text" name="penulis" required
                                        class="form-control">
                                </div>
                                <label>Penerbit :</label>
                                <div class="form-group">
                                    <input type="text" name="penerbit" required
                                        class="form-control">
                                </div>
                                <label>Tahun :</label>
                                <div class="form-group">
                                    <input type="text" name="tahun" required
                                        class="form-control">
                                </div>
                                <label>Stok :</label>
                                <div class="form-group">
                                    <input type="text" name="stok" required
                                        class="form-control">
                                </div>
                                <label>Harga Pokok :</label>
                                <div class="form-group">
                                    <input type="text" name="hargapokok" required
                                        class="form-control">
                                </div>
                                <label>Harga Jual :</label>
                                <div class="form-group">
                                    <input type="text" name="hargajual" required
                                        class="form-control">
                                </div>
                                <label>PPN :</label>
                                <div class="form-group">
                                    <input type="text" name="ppn" required
                                        class="form-control">
                                </div>
                                <label>Diskon :</label>
                                <div class="form-group">
                                    <input type="text" name="diskon" required
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
 <div class="modal fade text-left " id="EditForm" tabindex="-1"
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
                        <form action="{{ url('/input-buku/edit') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label>Kode :</label>
                                <div class="form-group">
                                    <input type="text" name="kode" readonly
                                        class="form-control id">
                                </div>
                                <label>Judul :</label>
                                <div class="form-group">
                                    <input type="text" name="judul" required
                                        class="form-control judul">
                                </div>
                                <label>No ISBN :</label>
                                <div class="form-group">
                                    <input type="text" name="noisbn" required
                                        class="form-control noisbn">
                                </div>
                                <label>Penulis :</label>
                                <div class="form-group">
                                    <input type="text" name="penulis" required
                                        class="form-control penulis">
                                </div>
                                <label>Penerbit :</label>
                                <div class="form-group">
                                    <input type="text" name="penerbit" required
                                        class="form-control penerbit">
                                </div>
                                <label>Tahun :</label>
                                <div class="form-group">
                                    <input type="text" name="tahun" required
                                        class="form-control tahun">
                                </div>
                                <label>Stok :</label>
                                <div class="form-group">
                                    <input type="text" name="stok" required
                                        class="form-control stok">
                                </div>
                                <label>Harga Pokok :</label>
                                <div class="form-group">
                                    <input type="text" name="hargapokok" required
                                        class="form-control hargapokok">
                                </div>
                                <label>Harga Jual :</label>
                                <div class="form-group">
                                    <input type="text" name="hargajual" required
                                        class="form-control hargajual">
                                </div>
                                <label>PPN :</label>
                                <div class="form-group">
                                    <input type="text" name="ppn" required
                                        class="form-control ppn">
                                </div>
                                <label>Diskon :</label>
                                <div class="form-group">
                                    <input type="text" name="diskon" required
                                    class="form-control diskon">
                                    <input type="hidden" name="jumlah" required
                                    class="form-control jumlah">
                                    <input type="text" name="jumlah" required
                                    class="form-control jumlah">
                                </div>
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
            <h2>Tabel Buku</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Inputan</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Input Buku</a>
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
                        <a herf="" class="btn btn-primary tambah text-white">Tambah Buku</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>No ISBN</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Harga Pokok</th>
                            <th>Harga Jual</th>
                            <th>Diskon</th>
                            <th>PPN</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        ?>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$data->id}}</td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->noisbn}}</td>
                            <td>{{$data->penulis}}</td>
                            <td>{{$data->penerbit}}</td>
                            <td>{{$data->tahun}}</td>
                            <td>{{$data->stok}}</td>
                            <td>{{$data->harga_pokok}}</td>
                            <td>{{$data->harga_jual}}</td>
                            <td>{{$data->ppn}}%</td>
                            <td>{{$data->diskon}}%</td>
                            <td>
                                <a href="/input-buku/{{$data->id}}/hapus" class="btn btn-danger hapus">Hapus</a>
                                <a class="btn btn-warning edit text-white" data-id="{{$data->id}}" data-judul="{{$data->judul}}" data-noisbn="{{$data->noisbn}}"  data-penulis="{{$data->penulis}}" data-penerbit="{{$data->penerbit}}" data-tahun="{{$data->tahun}}" data-stok="{{$data->stok}}" data-hargapokok="{{$data->harga_pokok}}" data-hargajual="{{$data->harga_jual}}" data-ppn="{{$data->ppn}}" data-diskon="{{$data->diskon}}" data-jumlah="{{$data->jumlah_penjualan}}" data-total="{{$data->total_penjualan}}">Edit</a>
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
        const judul = $(this).data("judul");
        const noisbn = $(this).data("noisbn");
        const penulis = $(this).data("penulis");
        const penerbit = $(this).data("penerbit");
        const tahun = $(this).data("tahun");
        const stok = $(this).data("stok");
        const hargapokok = $(this).data("hargapokok");
        const hargajual = $(this).data("hargajual");
        const ppn = $(this).data("ppn");
        const diskon = $(this).data("diskon");
        const jumlah = $(this).data("jumlah");
        const total = $(this).data("total");
        $('.id').val(id);
        $('.judul').val(judul);
        $('.noisbn').val(noisbn);
        $('.penulis').val(penulis);
        $('.penerbit').val(penerbit);
        $('.tahun').val(tahun);
        $('.tahun').val(tahun);
        $('.stok').val(stok);
        $('.hargapokok').val(hargapokok);
        $('.hargajual').val(hargajual);
        $('.ppn').val(ppn);
        $('.diskon').val(diskon);
        $('.jumlah').val(jumlah);
        $('.total').val(total);
        $('#EditForm').modal('show');
    });
</script>
@endsection