<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function index(){
        $slide = Slide::orderBy('id', 'asc')->get();
        return view('admin.slide.index',compact('slide'));
    }

    public function getThem(){
        return view('admin.slide.them');
    }

    public function postThem(Request $request){
        $slide = new Slide();
        $slide -> ten_slide = $request->ten_slide;
        if($request->hasFile('hinh_anh')){
            $file = $request->file('hinh_anh');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(5). "_" . Str::random(5). "_" .$name;
            while(file_exists("images/slide/" . $hinh)) {
                $hinh = Str::random(5). "_" . Str::random(5). "_" .$name;
            }
            $file->move("images/slide/", $hinh);
            $slide->hinh_anh = "images/slide/".$hinh;
        }
        $slide->save();
        return redirect()->back()->with('thongbao','Thêm thành công');
    }

    public function getXoa($id){
        Slide::destroy($id);
        return redirect()->back()->with('thongbao','Xoá thành công');
    }
}
