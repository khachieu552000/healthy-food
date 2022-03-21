<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /* Admin */

    public function index(){
        return view('admin.index');
    }

    public function getDangnhap(){
        return view('admin.layouts.login');
    }
    public function postDangnhap(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ]);

        $remember = $request->has('remember') ? true:false;
        if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password], $remember)){
            return redirect()->route('admin.index');
        } else{
            return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function dangxuat(){
        Auth::logout();
        return redirect()->route('admin.getdangnhap');
    }

    /* Người dùng */

    public function getUserSingup(){
        return view('pages.layouts.dangky');
    }

    public function postUserSingup(Request $request){
        $this->validate($request, [
            'email' =>'required|unique:users,email',
            'password' => 'required|min:6',
            'ho_ten' => 'required',
            'ngay_sinh' => 'required',
            'dia_chi' => 'required',
            'dien_thoai' => 'required',
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'email.unique'=>'Địa chỉ email đã tồn tại',
            'password.required'=>'Bạn chưa nhập password',
            'ho_ten.required'=>'Bạn chưa nhập tên',
            'ngay_sinh.required'=>'Bạn chưa nhập địa chỉ',
            'dien_thoai.required'=>'Bạn chưa nhậP số điện thoại',
        ]);
        $user = new User();
        $user->role = 5;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $khachhang = new KhachHang();
        $khachhang->user_id = $user->id;
        $khachhang->ho_ten = $request->ho_ten;
        $khachhang->ngay_sinh = $request->ngay_sinh;
        $khachhang->dia_chi = $request->dia_chi;
        $khachhang->dien_thoai = $request->dien_thoai;
        $khachhang->save();
        return redirect()->back()->with('thongbao', 'Đăng ký tài khoản thành công! Mời bạn đăng nhập vào hệ thống');
    }

    public function getUserLogin(){
        return view('pages.layouts.dangnhap');
    }

    public function postUserLogin(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required',
        ],[
            'eamil.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
        ]);
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect()->route('trangchu');
        } else {
            return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function getDangxuat(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
}
