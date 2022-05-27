<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DanhMuc;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class SanPhamController extends Controller
{
    public function index(){
        $sanpham= SanPham::orderBy('id','asc')->get();
        return view('admin.SanPham.index',compact('sanpham'));
    }
    public function getThem(){
        $danhmuc = DanhMuc::all();
        return view('admin.SanPham.them', compact('danhmuc'));
    }

    public function postThem(Request $request){
        $this->validate($request, [
            'ten_san_pham' => 'required|unique:san_pham,ten_san_pham',
            'danh_muc' => 'required',
            'so_luong' => 'required|numeric|min:1',
            'don_gia_ban' => 'required|numeric|min:0',
            'hinh_anh' => 'required|image',
        ],[
            'ten_san_pham.required' => 'Bạn chưa nhập tên sản phẩm',
            'ten_san_pham.unique' => 'Bạn nhập trùng tên sản phẩm',
            'danh_muc.required' => 'Bạn chưa chọn danh mục',
            'so_luong.required' => 'Bạn chưa nhập số lượng',
            'so_luong.numeric' => 'Bạn phải nhập số !',
            'so_luong.min' => 'Số lượng phải lớn hơn 1',
            'don_gia_ban.requqired' => 'Bạn chưa nhập giá bán',
            'don_gia_ban.min' => 'Bạn phải nhập số !',
            'don_gia_ban.min' => 'Giá bán phải lớn hơn 0',
            'hinh_anh.required' => 'Bạn chưa tải hình ảnh lên',
            'hinh_anh.image' => 'Hình ảnh tải lên không đúng định dạng',
        ]);
            $sanpham = new SanPham();
            $sanpham->danh_muc_id = $request->danh_muc;
            $sanpham->ten_san_pham = $request->ten_san_pham;
            $sanpham->slug = \Str::slug($request->ten_san_pham);
            $sanpham->so_luong = $request->so_luong;
            $sanpham->don_gia_ban = $request->don_gia_ban;
            $sanpham->thuoc_tinh = $request->thuoc_tinh;
            $sanpham->mo_ta = $request->mo_ta;
            if($request->hasFile('hinh_anh')){
                $file = $request->file('hinh_anh');
                $name = $file->getClientOriginalName();
                $hinh = Str::random(5). "_" . Str::random(5). "_" .$name;
                while(file_exists("images/sanpham/" .$hinh)) {
                    $hinh = Str::random(5). "_" . Str::random(5). "_" .$name;
                }
                $file->move("images/sanpham/", $hinh);
                $sanpham->hinh_anh = "images/sanpham/" .$hinh;
            }
            $sanpham->save();
        return redirect()->route('admin.sanpham.index')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
        $danhmuc = DanhMuc::all();
        $sanpham = SanPham::find($id);
        return view('admin.SanPham.sua', compact('danhmuc','sanpham'));
    }

    public function postSua(Request $request, $id){
        $sanpham = SanPham::find($id);
        $this->validate($request, [
            'ten_san_pham' => 'required',
            'danh_muc' => 'required',
            'so_luong' => 'required|numeric|min:1',
            'don_gia_ban' => 'required|numeric|min:0',
            'hinh_anh' => 'image',
        ],[
            'ten_san_pham.required' => 'Bạn chưa nhập tên sản phẩm',
            'danh_muc.required' => 'Bạn chưa chọn danh mục',
            'so_luong.required' => 'Bạn chưa nhập số lượng',
            'so_luong.numeric' => 'Bạn phải nhập số !',
            'so_luong.min' => 'Số lượng phải lớn hơn 1',
            'don_gia_ban.requqired' => 'Bạn chưa nhập giá bán',
            'don_gia_ban.min' => 'Bạn phải nhập số !',
            'don_gia_ban.min' => 'Giá bán phải lớn hơn 0',
            'hinh_anh.image' => 'Hình ảnh tải lên không đúng định dạng',
        ]);
        $sanpham->danh_muc_id = $request->danh_muc;
        $sanpham->ten_san_pham = $request->ten_san_pham;
        $sanpham->slug = \Str::slug($request->ten_san_pham);
        $sanpham->so_luong = $request->so_luong;
        $sanpham->don_gia_ban = $request->don_gia_ban;
        $sanpham->thuoc_tinh = $request->thuoc_tinh;
        $sanpham->mo_ta = $request->mo_ta;
        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(5). "_" . Str::random(5) . "_" . $name;
            while (file_exits('images/sanpham/'.$hinh)) {
                $hinh = Str::random(5). "_" . Str::random(5) . "_" . $name;
            }
            $file -> move('images/sanpham/',$hinh);
            $sanpham->hinh_anh = 'images/sanpham/'.$hinh;
        }
        $sanpham->save();
        return redirect()->route('admin.sanpham.index')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
        SanPham::destroy($id);
        return redirect()->back()->with('thongbao', 'Xoá thành công');
    }
}
