<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\KhacHangController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\ThongKeController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Psy\TabCompletion\AutoCompleter;

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
// admin

Route::get('dang-nhap', [AuthController::class, 'getDangnhap'])->name('admin.getdangnhap');
Route::post('dang-nhap', [AuthController::class, 'postDangnhap'])->name('admin.postDangnhap');
Route::prefix('admin')->middleware('admin')->group(function () {

Route::get('/',[AuthController::class, 'index'])->name('admin.index');
Route::get('dang-xuat', [AuthController::class, 'dangxuat'])->name('admin.dangxuat');
Route::prefix('danh-muc')->group(function () {
    Route::get('/', [DanhMucController::class, 'index'])->name('Danhmuc.index');
    Route::post('them', [DanhMucController::class, 'postThem'])->name('Danhmuc.postThem');
    Route::get('sua/{id}', [DanhMucController::class, 'getSua'])->name('Danhmuc.getSua');
    Route::post('sua/{id}', [DanhMucController::class, 'postSua'])->name('Danhmuc.postSua');
    Route::get('xoa/{id}', [DanhMucController::class, 'getXoa'])->name('admin.DanhMuc.getXoa');

});

Route::prefix('san-pham')->group(function () {
    Route::get('/', [SanPhamController::class, 'index'])->name('admin.sanpham.index');
    Route::get('them', [SanPhamController::class, 'getThem'])->name('admin.sanpham.getThem');
    Route::post('them', [SanPhamController::class, 'postThem'])->name('admin.sanpham.postThem');
    Route::get('sua/{id}', [SanPhamController::class, 'getSua'])->name('admin.sanpham.getSua');
    Route::post('sua/{id}', [SanPhamController::class, 'postSua'])->name('admin.sanpham.postSua');
    Route::get('xoa/{id}', [SanPhamController::class, 'getXoa'])->name('admin.sanpham.getXoa');
});

Route::prefix('lien-he')->group(function () {
    Route::get('/', [LienHeController::class, 'index'])->name('admin.lienhe.index');
});

Route::prefix('khach-hang')->group(function () {
    Route::get('/', [KhacHangController::class, 'index'])->name('admin.khachhang.index');

});

Route::prefix('hoa-don')->group(function () {
    Route::get('/', [HoaDonController::class, 'index'])->name('admin.hoadon.index');
    Route::get('xac-nhan-don-hang/{id}', [HoaDonController::class, 'acceptOrder'])->name('admin.hoadon.acceptOrder');
    Route::get('bat-dau-giao-hang/{id}', [HoaDonController::class, 'startShip'])->name('admin.hoadon.startShip');
    Route::get('huy-giao-hang/{id}', [HoaDonController::class, 'cancelShip'])->name('admin.hoadon.cancelShip');
    Route::get('huy-don-hang/{id}', [HoaDonController::class, 'cancelOrder'])->name('admin.hoadon.AdmincancelOrder');
    Route::get('xac-nhan-thanh-toan/{id}', [HoaDonController::class, 'acceptPayment'])->name('admin.hoadon.acceptPayment');
    Route::get('xem-chi-tiet-hoa-don/{id}', [HoaDonController::class, 'getView'])->name('admin.hoadon.getView');

});

Route::prefix('nhan-vien')->group(function () {
    Route::get('/', [NhanVienController::class, 'index'])->name('admin.nhanvien.index');
    Route::get('them', [NhanVienController::class, 'getThem'])->name('admin.nhanvien.getThem');
    Route::post('them', [NhanVienController::class, 'postThem'])->name('admin.nhanvien.postThem');
    Route::get('sua/{id}', [NhanVienController::class, 'getSua'])->name('admin.nhanvien.getSua');
    Route::post('sua/{id}', [NhanVienController::class, 'postSua'])->name('admin.nhanvien.postSua');
    Route::get('dat-mat-khau/{id}', [NhanVienController::class, 'getDatMatkhau'])->name('admin.nhanvien.getDatMatkhau');
    Route::get('xoa/{id}', [NhanVienController::class, 'getXoa'])->name('admin.nhanvien.getXoa');
    Route::get('thong-tin-nhan-vien', [NhanVienController::class, 'getThongtin'])->name('admin.thongtin.getThongtin');
    Route::get('doi-mat-khau', [NhanVienController::class, 'getMatkhau'])->name('admin.nhanvien.getMatkhau');
    Route::post('doi-mat-khau', [NhanVienController::class, 'postMatkhau'])->name('admin.nhanvien.postMatkhau');

});


Route::prefix('thong-ke')->group(function () {
    Route::get('/', [ThongKeController::class, 'index'])->name('admin.thongke.index');
    Route::get('bieu-do', [ThongKeController::class, 'thongke1'])->name('admin.thongke.thongke1');

});
});

// Người dùng
Route::get('/', [PagesController::class, 'index'])->name('trangchu');
Route::prefix('nguoi-dung')->group(function () {
    Route::get('dang-ky', [AuthController::class, 'getUserSingup'])->name('pages.getDangky');
    Route::post('dang-ky', [AuthController::class, 'postUserSingup'])->name('pages.postDangKy');
    Route::get('dang-nhap', [AuthController::class, 'getUserLogin'])->name('pages.dangnhap');
    Route::post('dang-nhap', [AuthController::class, 'postUserLogin'])->name('pages.postDangnhap');
    Route::get('dang-xuat', [AuthController::class, 'getDangxuat'])->name('pages.getDangxuat');
    Route::get('{slug}&id={id_muc}', [PagesController::class, 'getSanpham'])->name(('pages.sanpham'));
    Route::get('{muc_slug}&id={danh_muc_id}/{sp_slug}&id={id_sp}', [PagesController::class, 'getChitietsanpham'])->name('pages.chitietsanpham');
    Route::get('gio-hang', [GioHangController::class, 'getGiohang'])->name('pages.giohang');
    Route::get('them/{id}', [GioHangController::class, 'themGiohang'])->name('pages.themGiohang');
    Route::get('xoa/{id}', [GioHangController::class, 'xoaGiohang'])->name('pages.xoaGiohang');
    Route::get('sua/{id}/{tong}', [GioHangController::class, 'suaGiohang'])->name('pages.suaGiohang');
    Route::get('mua-ngay/{id}',[GioHangController::class, 'muangay'])->name('pages.muangay');
Route::prefix('thanh-toan')->group(function () {
    Route::get('/', [GioHangController::class, 'getThanhtoan'])->name('pages.getThanhtoan');
    Route::post('/', [GioHangController::class, 'postThanhtoan'])->name('pages.postThanhtoan');
    Route::post('thong-tin-thanh-toan', [GioHangController::class, 'postThanhtoan1'])->name('pages.postThanhtoan1');
});
    Route::get('thong-bao', [GioHangController::class, 'thongbao'])->name('pages.thongbao');
    Route::get('tim-kiem', [PagesController::class, 'timkiem'])->name('pages.timkiem');
    Route::get('lien-he', [PagesController::class, 'getLienhe'])->name('pages.lienhe');
    Route::post('lien-he', [PagesController::class, 'postLienhe'])->name('pages.postLienhe');
    Route::get('gioi-thieu', [PagesController::class, 'getGioithieu'])->name('pages.gioithieu');
    Route::get('thong-tin', [TaiKhoanController::class, 'getThongtinUser'])->name('pages.getThongtinUser')->middleware('user');
    Route::post('thong-tin', [TaiKhoanController::class, 'postThongtinUser'])->name('pages.postThongtinUser')->middleware('user');
    Route::get('doi-mat-khau', [TaiKhoanController::class, 'getMatkhauUser'])->name('pages.getMatkhauUser')->middleware('user');
    Route::post('doi-mat-khau', [TaiKhoanController::class, 'postMatkhauUser'])->name('pages.postMatkhauUser')->middleware('user');
    Route::get('lich-su', [TaiKhoanController::class, 'getLichsu'])->name('pages.getLichsu')->middleware('user');
    Route::get('huy/{id}', [TaiKhoanController::class, 'getHuy'])->name('pages.getHuy')->middleware('user');
});
