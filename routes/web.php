<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputDistributorController;
use App\Http\Controllers\InputBukuController;
use App\Http\Controllers\InputPasokBukuController;
use App\Http\Controllers\LaporanAdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LaporanKasirController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::post('/auth/login', [LoginController::class, 'login']);
Route::get('/Dashboard/admin', [HomeController::class, 'index']);
Route::get('/Dashboard/kasir', [HomeController::class, 'kasir']);
Route::get('/Dashboard/manager', [HomeController::class, 'manager']);
Route::get('/input-distributor', [InputDistributorController::class, 'index']);
Route::get('/input-distributor/{id_distributor}/hapus', [InputDistributorController::class, 'delete']);
Route::post('/input-distributor/tambah', [InputDistributorController::class, 'add']);
Route::post('/input-distributor/edit', [InputDistributorController::class, 'edit']);

Route::get('/input-buku', [InputBukuController::class, 'index']);
Route::get('/input-buku/{id}/hapus', [InputBukuController::class, 'delete']);
Route::post('/input-buku/tambah', [InputBukuController::class, 'add']);
Route::post('/input-buku/edit', [InputBukuController::class, 'edit']);

Route::get('/input-pasokbuku', [InputPasokBukuController::class, 'index']);
Route::get('/input-pasokbuku/{id_pasok}/hapus', [InputPasokBukuController::class, 'delete']);
Route::post('/input-pasokbuku/tambah', [InputPasokBukuController::class, 'add']);
Route::post('/input-pasokbuku/edit', [InputPasokBukuController::class, 'edit']);

Route::get('/laporan-data-buku', [LaporanAdminController::class, 'DataBuku']);
Route::get('/laporan-data-buku/cetak', [LaporanAdminController::class, 'CetakDataBuku']);

Route::get('/laporan-data-buku-penulis', [LaporanAdminController::class, 'IndexBukuPerPenulis']);
Route::post('/laporan-data-buku-penulis/penulis', [LaporanAdminController::class, 'DataBukuPerpenulis']);
Route::get('/laporan-data-buku-penulis/{nama_penulis}/cetak', [LaporanAdminController::class, 'CetakDataBukuPerpenulis']);

Route::get('/laporan-buku-sering-terjual', [LaporanAdminController::class, 'IndexBukuPerPenjualan']);
Route::get('/laporan-buku-sering-terjual/cetak', [LaporanAdminController::class, 'CetakDataBukuPenjualanMax']);

Route::get('/laporan-buku-tidak-terjual', [LaporanAdminController::class, 'IndexBukuPerTidakAdaPenjualan']);
Route::get('/laporan-buku-tidak-terjual/cetak', [LaporanAdminController::class, 'CetakDataBukuPenjualanMin']);

Route::get('/laporan-data-pasok-buku', [LaporanAdminController::class, 'DataPasokBuku']);
Route::post('/laporan-data-pasok-buku/cari', [LaporanAdminController::class, 'CariDataPasokBuku']);
Route::get('/laporan-buku-tidak-terjual/cetak', [LaporanAdminController::class, 'CetakDataPasokBuku']);

Route::get('/laporan-data-buku-distributor', [LaporanAdminController::class, 'IndexBukuPerdistributor']);
Route::post('/laporan-data-buku-distributor/distributor', [LaporanAdminController::class, 'DataBukuPerdistributor']);
Route::get('/laporan-data-buku-distributor/distributor/cetak', [LaporanAdminController::class, 'CetakDataBukuPerdistributor']);

Route::get('/manager/laporan-data-buku', [ManagerController::class, 'DataBuku']);
Route::get('/manager/laporan-data-buku/cetak', [ManagerController::class, 'CetakDataBuku']);

Route::get('/manager/laporan-data-buku-penulis', [ManagerController::class, 'IndexBukuPerPenulis']);
Route::post('/manager/laporan-data-buku-penulis/penulis', [ManagerController::class, 'DataBukuPerpenulis']);
Route::get('/manager/laporan-data-buku-penulis/{nama_penulis}/cetak', [ManagerController::class, 'CetakDataBukuPerpenulis']);

Route::get('/manager/laporan-buku-sering-terjual', [ManagerController::class, 'IndexBukuPerPenjualan']);
Route::get('/manager/laporan-buku-sering-terjual/cetak', [ManagerController::class, 'CetakDataBukuPenjualanMax']);

Route::get('/manager/laporan-buku-tidak-terjual', [ManagerController::class, 'IndexBukuPerTidakAdaPenjualan']);
Route::get('/manager/laporan-buku-tidak-terjual/cetak', [ManagerController::class, 'CetakDataBukuPenjualanMin']);

Route::get('/manager/laporan-data-pasok-buku', [ManagerController::class, 'DataPasokBuku']);
Route::post('/manager/laporan-data-pasok-buku/cari', [ManagerController::class, 'CariDataPasokBuku']);
Route::get('/manager/laporan-buku-tidak-terjual/cetak', [ManagerController::class, 'CetakDataPasokBuku']);

Route::get('/manager/laporan-data-buku-distributor', [ManagerController::class, 'IndexBukuPerdistributor']);
Route::post('/manager/laporan-data-buku-distributor/distributor', [ManagerController::class, 'DataBukuPerdistributor']);
Route::get('/manager/laporan-data-buku-distributor/distributor/cetak', [ManagerController::class, 'CetakDataBukuPerdistributor']);

Route::get('/manager/cetak-faktur', [ManagerController::class, 'InputFaktur']);
Route::post('/manager/data-penjualan-perfaktur', [ManagerController::class, 'DataPerFaktur']);
Route::get('/manager/cetak/struk/perfaktur', [ManagerController::class, 'CetakDataPerFaktur']);

Route::get('/manager/semua-penjualan', [ManagerController::class, 'DataPenjualan']);
Route::get('/manager/cetak/semua-penjualan', [ManagerController::class, 'CetakDataPenjualan']);

Route::get('/manager/penjualan-pertanggal/cetak', [ManagerController::class, 'CetakDataPenjualanBuku']);
Route::get('/manager/penjualan-pertanggal', [ManagerController::class, 'DataPenjualanBuku']);
Route::post('/manager/penjualan-pertanggal/cari', [ManagerController::class, 'CariDataPenjualanBuku']);

Route::get('/penjualan', [KasirController::class, 'index']);
Route::get('/penjualan/{id}', [KasirController::class, 'GetData']);
Route::get('/penjualan/keranjang', [KasirController::class, 'NewKeranjang']);
Route::redirect('/penjualan/keranjang', [KasirController::class, 'NewKeranjang']);
Route::get('/penjualan/keranjang/struk', [KasirController::class, 'Struk']);
Route::get('/cetak/struk', [KasirController::class, 'CetakStruk']);
Route::post('/penjualan/keranjang', [KasirController::class, 'Keranjang']);
Route::post('/penjualan/keranjang/checkout', [KasirController::class, 'Checkout']);
Route::get('/penjualan/keranjang/{id}', [KasirController::class, 'Delete']);

Route::get('/cetak-faktur', [LaporanKasirController::class, 'InputFaktur']);
Route::post('/data-penjualan-perfaktur', [LaporanKasirController::class, 'DataPerFaktur']);
Route::get('/cetak/struk/perfaktur', [LaporanKasirController::class, 'CetakDataPerFaktur']);

Route::get('/semua-penjualan', [LaporanKasirController::class, 'DataPenjualan']);
Route::get('/cetak/semua-penjualan', [LaporanKasirController::class, 'CetakDataPenjualan']);

Route::get('/penjualan-pertanggal/cetak', [LaporanKasirController::class, 'CetakDataPenjualanBuku']);
Route::get('/penjualan-pertanggal', [LaporanKasirController::class, 'DataPenjualanBuku']);
Route::post('/penjualan-pertanggal/cari', [LaporanKasirController::class, 'CariDataPenjualanBuku']);

Route::get('/profil-perusahaan', [ManagerController::class, 'GetProfilPerusahaan']);
Route::get('/profil-manager', [ManagerController::class, 'GetProfilManager']);
Route::post('/ubah-data-manager', [ManagerController::class, 'UbahProfilManager']);

Route::get('/profil-admin', [LaporanAdminController::class, 'GetProfilAdmin']);
Route::post('/ubah-data-admin', [LaporanAdminController::class, 'UbahProfilAdmin']);

Route::get('/profil-kasir', [KasirController::class, 'GetProfilKasir']);
Route::post('/ubah-data-kasir', [KasirController::class, 'UbahProfilKasir']);