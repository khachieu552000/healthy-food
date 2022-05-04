<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\ChiTietHoaDon;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class GioHangController extends Controller
{
    public function getGiohang(){
        // $cartId = Session('Carts');
        // foreach($cartId as $key => $value){
        //     foreach($value as $key=>$val){
        //     // dd($val['so_luong']);
        //     if($val['so_luong'] <= $sanpham->so_luong){
        //     }
        //     }
        // }
        // dd($car);
        // $carts = Session('Carts');
        // dd($carts);
        // dd(Session('Carts')->sanpham[5]['so_luong']);

    //     foreach($carts as $key => $value){
    //         foreach($value as $key=>$val){
    //         // $count = count($value);
    //         $count = count($val);
    //         dd($count);
    //         }
    // }
    // dd(Session('Carts')->sanpham);
    // dd($count);
        return view('pages.giohang');
    }

    public function themGiohang(Request $request, $id){
        $sanpham = SanPham::find($id);
        if ($sanpham !=null) {
            $oldCart = Session('Carts') ? Session('Carts') : null;
            $newCart = new Carts($oldCart);
            $newCart->addCart($sanpham, $id);
            $request->session()->put('Carts', $newCart);
        }
        view('pages.giohang', compact('newCart'));
        return redirect()->back();
    }

    public function xoaGiohang(Request $request, $id){
        $oldCart = Session('Carts') ? Session('Carts') : null;
        $newCart = new Carts($oldCart);
        $newCart->deleteItemCart($id);
        if(count($newCart->sanpham)>0){
            $request->Session()->put('Carts', $newCart);
        } else{
            $request->Session()->forget('Carts');
        }
        return redirect()->route('pages.giohang');
    }

    public function suaGiohang(Request $request, $id, $tong) {
        $oldCart = Session('Carts') ? Session('Carts') : null;
        $newCart = new Carts($oldCart);
        $newCart->UpdateItemCart($id, $tong);
        $request->Session()->put('Carts', $newCart);
        return redirect()->route('pages.giohang');
    }

    public function thongbao(){
        return view('pages.thongbao');
    }

    public function getThanhtoan(){
        return view('pages.thanhtoan');
    }

    public function postThanhtoan(Request $request){
        $this->validate($request, [
            'ho_ten' => 'required',
            'ngay_sinh' => 'required',
            'dien_thoai' => 'required|numeric',
            'dia_chi' => 'required',
        ],[
            'ho_ten.required' => 'Bạn chưa nhập họ tên',
            'ngay_sinh.required' => 'Bạn chưa nhập ngày sinh',
            'dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
            'dien_thoai.numerric' => 'Số điện thoại phải là số',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ',
        ]);
        $khachhang = KhachHang::find(Auth::user()->khach_hang->id);
        $khachhang->ho_ten = $request->ho_ten;
        $khachhang->ngay_sinh = $request->ngay_sinh;
        $khachhang->dien_thoai = $request->dien_thoai;
        $khachhang->dia_chi = $request->dia_chi;
        $khachhang->save();
        $cart = \Session::get('Carts');
        $hoadon = new HoaDon();
        $hoadon->khach_hang_id = $khachhang->id;
        $hoadon->ngay_lap = \Carbon\Carbon::now();
        $hoadon->tong_tien = $cart->tonggia;
        $hoadon->save();

        foreach($cart->sanpham as $key=>$value){
            $cthd = new ChiTietHoaDon();
            $cthd->hoa_don_id = $hoadon->id;
            $cthd->san_pham_id = $key;
            $cthd->so_luong = $value['so_luong'];
            $cthd->don_gia = $value['don_gia_ban']/$value['so_luong'];
            $cthd->thanh_tien = $value['so_luong'] * ($value['don_gia_ban']/$value['so_luong']);
            $cthd->save();

            $sanpham = SanPham::find($key);
            $sanpham->so_luong -= $value['so_luong'];
            $sanpham->da_ban += $value['so_luong'];
            $sanpham->save();
        }

        $request->Session()->forget('Carts');
        return redirect()->route('pages.thongbao');
    }

    public function postThanhtoan1(Request $request){
        $this->validate($request, [
            'ho_ten' => 'required',
            'ngay_sinh' => 'required',
            'dien_thoai' => 'required|numeric',
            'dia_chi' => 'required',
        ],[
            'ho_ten.required' => 'Bạn chưa nhập họ tên',
            'ngay_sinh.required' => 'Bạn chưa nhập ngày sinh',
            'dien_thoai.required' => 'Bạn chưa nhập số điện thoại',
            'dien_thoai.numerric' => 'Số điện thoại phải là số',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ',
        ]);
        $kh = new KhachHang();
        $kh->ho_ten = $request->ho_ten;
        $kh->ngay_sinh = $request->ngay_sinh;
        $kh->dien_thoai = $request->dien_thoai;
        $kh->dia_chi = $request->dia_chi;
        $kh->save();

        $cart = \Session::get('Carts');
        $hoadon = new HoaDon();
        $hoadon->khach_hang_id = $kh->id;
        $hoadon->ngay_lap = \Carbon\Carbon::now();
        $hoadon->tong_tien = $cart->tonggia;
        $hoadon->save();

        foreach($cart->sanpham as $key=>$value){
            $cthd = new ChiTietHoaDon();
            $cthd->hoa_don_id = $hoadon->id;
            $cthd->san_pham_id = $key;
            $cthd->so_luong = $value['so_luong'];
            $cthd->don_gia = $value['don_gia_ban']/$value['so_luong'];
            $cthd->thanh_tien = $value['so_luong'] * ($value['don_gia_ban']/$value['so_luong']);
            $cthd->save();

            $sanpham = SanPham::find($key);
            $sanpham->so_luong -= $value['so_luong'];
            $sanpham->da_ban += $value['so_luong'];
            $sanpham->save();
        }
        $request->Session()->forget('Carts');
        return redirect()->route('pages.thongbao');

    }

    public function muangay(Request $request, $id){
        $sanpham = SanPham::find($id);
        if ($sanpham !=null) {
            $oldCart = Session('Carts') ? Session('Carts') : null;
            $newCart = new Carts($oldCart);
            $newCart->addCart($sanpham, $id);

            $request->session()->put('Carts', $newCart);
        }
        // dd($newCart);
        view('pages.giohang', compact('newCart'));
        return redirect()->route('pages.giohang');
    }
}
