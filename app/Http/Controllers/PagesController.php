<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\LoiNhan;
use App\Models\SanPham;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $tops= SanPham::where('da_ban','>',10)->paginate(4);
        $alls = SanPham::paginate(8,['*'],'pag');
        return view('pages.index', compact('tops','alls'));
    }

    public function getSanpham($slug, $id_muc){
        $sanpham = SanPham::where('danh_muc_id',$id_muc)->paginate(16);
        $danhmuc = DanhMuc::where('id', $id_muc)->first();
        $menu = DanhMuc::all();
        // dd($sanpham);
        return view('pages.sanpham', compact('sanpham','danhmuc','menu'));
    }

    public function getChitietsanpham($muc_slug,$danh_muc_id,$sp_slug,$id_sp){
        $chitiet = SanPham::find($id_sp);
        return view('pages.chitietsanpham', compact('chitiet'));
    }

    public function timkiem(Request $request){
        $menu = DanhMuc::all();
        $sanpham = SanPham::where('ten_san_pham','like','%'.$request->keyname.'%')
        ->orwhere('don_gia_ban',$request->keyname)->get();
        // dd($sanpham[0]);
        return view('pages.timkiem', compact('sanpham','menu'));
    }

    public function getLienhe(){
        return view('pages.lienhe');
    }

    public function postLienhe(Request $request){
        $this->validate($request, [
            'ho_ten' => 'required',
            'email' => 'required',
            'dien_thoai' => 'required|numeric',
            'noi_dung' => 'required',
        ],[
            'ho_ten.required' => 'Bạn chưa nhập họ tên',
            'email.required' => 'Bạn chưa nhập email',
            'dien_thoai.required' => 'Bạn chưa nhập điện thoại',
            'dien_thoai.numeric' => 'Bạn chưa nhập số điện thoại',
            'noi_dung.required' => ' Bạn chưa nhập nội dung',
        ]);

        $tt = new LoiNhan();
        $tt->ho_ten = $request->ho_ten;
        $tt->email = $request->email;
        $tt->dien_thoai = $request->dien_thoai;
        $tt->noi_dung = $request->noi_dung;
        $tt->save();
        return redirect()->back()->with('thongbao', 'Đã gửi lời nhắn');
    }

    public function getGioithieu(){
        return view('pages.gioithieu');
    }
}
