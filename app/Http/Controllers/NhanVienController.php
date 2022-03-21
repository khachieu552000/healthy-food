<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    public function index(){
        $user = User::where('role',2)->get();
        return view('admin.NhanVien.index', compact('user'));
    }

    public function getThem(){
        return view('admin.NhanVien.them');
    }

    public function postThem(Request $request){
        $this->validate($request, [
            'ho_ten' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:32',
            'dien_thoai' => 'required',
            'ngay_sinh' => 'required',
            'gioi_tinh' => 'required',
            'dia_chi' => 'required',
        ],
        [
            "ho_ten.required" => "Hãy nhập tên!",
            "email.required" => "Hãy nhập email!",
            "email.unique" => "Email đã tồn tại!",
            "password.required" => "Hãy nhập password!",
            "password.min" => "Độ dài mật khẩu lớn hơn 6!",
            "password.max" => "Độ dài mật khẩu nhỏ hơn 32!",
            "dien_thoai.required" => "Hãy nhập số điện thoại!",
            "ngay_sinh.required" => "Hãy nhập ngày sinh!",
            "gioi_tinh.required" => "Hãy chọn giới tính!",
            "dia_chi.required" => "Hãy nhập địa chỉ!",
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 2;
        $user ->save();

        $nhanvien = new NhanVien();
        $nhanvien->user_id = $user->id;
        $nhanvien->ho_ten = $request->ho_ten;
        $nhanvien->gioi_tinh = $request->gioi_tinh;
        $nhanvien->ngay_sinh = $request->ngay_sinh;
        $nhanvien->dia_chi = $request->dia_chi;
        $nhanvien->dien_thoai = $request->dien_thoai;
        $nhanvien->save();

        return redirect()->back()->with('thongbao', 'Thêm mới nhân viên thành công!');
    }

    public function getSua($id){
        $user = User::find($id);
        return view('admin.nhanvien.sua', compact('user'));
    }

    public function postSua(Request $request, $id){
        $user = User::find($id);
        $this->validate($request,[
            'ho_ten' => 'required',
            'dien_thoai' => 'required',
            'ngay_sinh' => 'required',
            'gioi_tinh' => 'required',
            'dia_chi' => 'required',
        ],
        [
            "ho_ten.required" => "Hãy nhập tên!",
            "dien_thoai.required" => "Hãy nhập số điện thoại!",
            "ngay_sinh.required" => "Hãy nhập ngày sinh!",
            "gioi_tinh.required" => "Hãy chọn giới tính!",
            "dia_chi.required" => "Hãy nhập địa chỉ!",
        ]);

        $nhanvien = NhanVien::where('user_id',$id)->get();
        foreach ($nhanvien as $nv) {
            $nv->ho_ten = $request->ho_ten;
            $nv->dien_thoai = $request->dien_thoai;
            $nv->ngay_sinh = $request->ngay_sinh;
            $nv->gioi_tinh = $request->gioi_tinh;
            $nv->dia_chi = $request->dia_chi;
            $nv->save();
        }
        return redirect()->back()->with('thongbao', 'Sửa thành công!');
    }

    public function getDatMatkhau($id){
        $user = User::find($id);
        $user->password = bcrypt('123456');
        $user->save();
        return redirect()->back()->with('thongbao', 'Mật khẩu được trả về "123456" !');
    }

    public function getXoa($id){
        $nhanvien = NhanVien::where('user_id',$id)->get();
        foreach($nhanvien as $nv){
            $nv->delete();
        }
        User::destroy($id);
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }

    public function getThongtin(){
        return view('admin.Profile.index');
    }

    public function getMatkhau(){
        return view('admin.Profile.doimatkhau');
    }

    public function postMatkhau(Request $request){
        $user = Auth::user();
        if (!(Hash::check($request->oldPassword, $user->password))) {
            return redirect()->back()->with('baoloi','Sai mật khẩu cũ !');
        } else if (strcmp($request->oldPassword, $request->password)==0){
            return redirect()->back()->with('baoloi', 'Mật khẩu mới trùng mật khẩu cũ!');
        }
        $user->password = bcrypt($request->password);
    	$user->update();
        return redirect()->back()->with('thongbao', 'Thay đổi mật khẩu thành công!');
    }

}
