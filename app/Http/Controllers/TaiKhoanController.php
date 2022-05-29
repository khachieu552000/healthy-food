<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\HoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\SanPham;

class TaiKhoanController extends Controller
{
    public function getThongtinUser(){
        return view('pages.taikhoan');
    }

    public function postThongtinUser(Request $request){
        $khachhang = KhachHang::find(Auth::user()->khach_hang->id);
        $this->validate($request,[
            'ho_ten'=>'required',
            'dien_thoai'=>'required',
            'ngay_sinh'=>'required',
            'dia_chi'=>'required',
        ],[
            'ho_ten.required'=>'Bạn chưa nhập họ tên',
            'dien_thoai.required'=>'Bạn chưa nhập điện thoại',
            'ngay_sinh.required'=>'Bạn chưa nhập ngày sinh',
            'dia_chi.required'=>'Bạn chưa nhập địa chỉ',
        ]);
        $khachhang->ho_ten = $request->ho_ten;
        $khachhang->dien_thoai = $request->dien_thoai;
        $khachhang->ngay_sinh = $request->ngay_sinh;
        $khachhang->dia_chi = $request->dia_chi;
        $khachhang->update();
        return redirect()->back()->with('thongbao', 'Thay đổi thông tin cá nhân thành công');
    }

    public function getMatkhauUser(){
        return view('pages.matkhau');
    }

    public function postMatkhauUser(Request $request){
        $this->validate($request,[
            'password'=>'required|min:6',
            'confirmPassword' => 'required|same:password',
        ],[
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
            'confirmPassword.required' => 'Bạn chưa nhập xác nhận mật khẩu',
            'confirmPassword.same' => 'Mật khẩu xác nhận không chính xác',
        ]);
        $user = Auth::user();
        if(!(Hash::check($request->oldPassword, $user->password))){
            return redirect()->back()->with('loi','Sai mật khẩu cũ');
        }
        elseif(strcmp($request->oldPassword, $request->password)==0){
            return redirect()->back()->with('loi','Mật khẩu mới trùng với mật khẩu cũ');
        }
        $user->password = bcrypt($request->password);
        $user->update();
        return redirect()->back()->with('thongbao', 'Thay đổi mật khẩu thành công!');
    }

    public function getLichsu(){
        $hoadon = HoaDon::where('khach_hang_id', Auth::user()->khach_hang->id)->orderBy('id','asc')->get();
        return view('pages.lichsu', compact('hoadon'));
    }

    public function getHuy($id){
        $hd = HoaDon::find($id);
        $hd->status = -1;
        $hd->update();
        $hoadonhuy = HoaDon::with('chi_tiet_hoa_don.san_pham')->find($id);
        if ($hoadonhuy->status === -1) {
            foreach ($hoadonhuy->chi_tiet_hoa_don as $value) {
                //  dd($value->san_pham_id);
                $sanpham = SanPham::where('id', $value->san_pham_id)->get();
                // dd($sanpham);
                foreach ($sanpham as $sp) {
                    $sp->so_luong += $value->so_luong;
                    $sp->da_ban -= $value->so_luong;
                    // $sanpham->da_ban -= $value['so_luong'];
                    $sp->save();
                }
            }
        }
        return redirect()->back();
    }
}
