<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    public function index(){
        $danhmuc = DanhMuc::orderBy('id', 'asc')->get();
        return view('admin.DanhMuc.index', compact('danhmuc'));
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'ten_danh_muc' => 'required|unique:danh_muc,ten_danh_muc'
        ],[
            'ten_danh_muc.required' => 'Bạn chưa nhập tên danh mục',
            'ten_danh_muc.unique' => 'Bạn nhập trùng tên danh mục'
        ]);
        $danhmuc = new DanhMuc();
        $danhmuc->ten_danh_muc = $request->ten_danh_muc;
        $danhmuc->slug = \Str::slug($request->ten_danh_muc);
        $danhmuc->save();
        return redirect()->back()->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $danhmuc = DanhMuc::find($id);
        return response()->json(['data'=>$danhmuc],200);
    }

    public function postSua(Request $request, $id){
        $danhmuc = DanhMuc::find($id);
        $this->validate($request,[
            'ten_danh_muc'=>'required|unique:danh_muc,ten_danh_muc',
        ],[
            'ten_danh_muc.required' => 'Bạn chưa nhập tên danh mục',
            'ten_danh_muc.unique' => 'Bạn nhập trùng tên danh mục',
        ]);
        $danhmuc->ten_danh_muc = $request->ten_danh_muc;
        $danhmuc->slug = \Str::slug($request->ten_danh_muc);
        $danhmuc->save();
        return redirect()->back()->with('thongbao', 'Sửa thành công!');

    }

    public function getXoa($id){
        DanhMuc::destroy($id);
        return redirect()->back()->with('thongbao','Xoá thành công!');
    }
}
