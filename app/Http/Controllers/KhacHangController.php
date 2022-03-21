<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhacHangController extends Controller
{
    public function index(){
        $khachhang = KhachHang::orderBy('id','asc')->get();
        return view('admin.KhachHang.index', compact('khachhang'));
    }
}
