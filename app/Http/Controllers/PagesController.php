<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $tops= SanPham::where('da_ban','>',3)->paginate(4);
        $alls = SanPham::paginate(8,['*'],'pag');
        return view('pages.index', compact('tops','alls'));
    }

    public function getSanpham($slug, $id_muc){
        $sanpham = SanPham::where('danh_muc_id',$id_muc)->paginate(16);
        $danhmuc = DanhMuc::where('id', $id_muc)->first();
        $menu = DanhMuc::all();
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
        return view('pages.timkiem', compact('sanpham','menu'));
    }

    public function getLienhe(){
        return view('pages.lienhe');
    }

    public function getGioithieu(){
        return view('pages.gioithieu');
    }
}
