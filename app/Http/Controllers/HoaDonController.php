<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    public function index(){
        $hoadon =HoaDon::orderBy('id', 'asc')->get();
        return view('admin.HoaDon.index', compact('hoadon'));
    }

    public function acceptOrder($id){
        $hoadon = HoaDon::find($id);
        $hoadon->status = 1;
        $hoadon->update();
        return redirect()->back()->with('thongbao','Xác nhận đơn hàng MHD'.$hoadon->id.'thành công');
    }

    public function startShip($id){
        $hoadon = HoaDon::find($id);
        $hoadon->status = 2;
        $hoadon->update();
        return redirect()->back()->with('thongbao', 'Đơn hàng MHD'.$hoadon->id.'đã được giao');
    }

    public function cancelOrder($id){
        $hoadon = HoaDon::find($id);
        if ($hoadon->status == 0 && $hoadon->khach_hang_id = \Auth::user()->khach_hang->id) {
            $hoadon->status = -1;
            $hoadon->update();
            return redirect()->back()->with('thongbao', 'Đơn hàng MHD'.$hoadon->id.' đã được huỷ!');
        } elseif($hoadon->status == -2){
            $hoadon->status = -1;
            $hoadon->update();
            return redirect()->back()->with('thongbao', 'Đơn hàng MHD'.$hoadon->id.' đã được huỷ!');
        }
    }

     public function cancelShip($id){
         $hoadon = HoaDon::find($id);
         $hoadon->status = -2;
         $hoadon->update();
         return redirect()->back()->with('thongbao', 'Đơn hàng MHD'.$hoadon->id.' giao hàng không thành công, chờ giao lại!');
     }

     public function acceptPayment($id){
         $hoadon = HoaDon::find($id);
         $hoadon->status = 3;
         $hoadon->update();
         return redirect()->back()->with('thongbao', 'Đơn hàng MHD'.$hoadon->id.' đã được thanh toán!');
     }

     public function getView($id){
        $hoadon = HoaDon::find($id);
        $respone = array('data' => $hoadon);

        $khach_hang = $hoadon->khach_hang;
        $respone['data']['khach_hang'] = $khach_hang;

        foreach ($hoadon->chi_tiet_hoa_don as $item) {
            $respone['data']['chi_tiet_hoa_don'] = $item;
            if($item->san_pham) {
                foreach ($item->san_pham as $item2) {
                }
            } else {
                $respone['data']['chi_tiet_hoa_don']['san_pham'] = "Không tồn tại";
            }
        }
         return $respone;
     }
}
