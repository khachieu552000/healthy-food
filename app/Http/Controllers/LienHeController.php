<?php

namespace App\Http\Controllers;

use App\Models\LoiNhan;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    public function index(){
        $thongtin = LoiNhan::orderBy('id', 'asc')->get();
        return view('admin.LienHe.index', compact('thongtin'));
    }
}
