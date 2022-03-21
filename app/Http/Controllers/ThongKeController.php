<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class ThongKeController extends Controller
{
    public function index(){
        $month = ['1','2','3','4','5','6','7','8','9','10','11','12'];
        $hoadon = [];
        foreach ($month as $key => $value) {
            $hoadon[] = HoaDon::where(DB::raw("month(created_at)"),$value)->sum('tong_tien');
        }
        // dd($hoadon);
        return view('admin.ThongKe.index')->with('month', json_encode($month,JSON_NUMERIC_CHECK))->with('hoadon', json_encode($hoadon, JSON_NUMERIC_CHECK));
    }
}
