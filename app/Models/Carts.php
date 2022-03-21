<?php
namespace App\Models;
class Carts
{
    public $sanpham = null;
    public $tonggia = 0;
    public $tongsoluong = 0;

    public function __construct($cart) {
        if ($cart) {
            $this->sanpham = $cart->sanpham;
            $this->tonggia = $cart->tonggia;
            $this->tongsoluong = $cart->tongsoluong;
        }
    }

    public function addCart($sanpham, $id) {
        $sanphamInfo = ['id' => $sanpham->id, 'danh_muc' => $sanpham->danh_muc->ten_danh_muc, 'ten_danh_muc' => $sanpham->ten_san_pham, 'don_gia_ban'=>$sanpham->don_gia_ban];
        $newsanpham = ['so_luong' => 0, 'don_gia_ban' => $sanpham->don_gia_ban, 'sanphamInfo' => $sanpham];
        if ($this->sanpham) {
            if (array_key_exists($id, $this->sanpham)) {
                $newsanpham = $this->sanpham[$id];
            }
        }
        $newsanpham['so_luong']++;
        $newsanpham['don_gia_ban'] = $newsanpham['so_luong'] * $sanpham->don_gia_ban;
        $this->sanpham[$id] = $newsanpham;
        $this->tonggia += $sanpham->don_gia_ban;
        $this->tongsoluong++;
    }

    public function deleteItemCart($id) {
        $this->tongsoluong -= $this->sanpham[$id]['so_luong'];
        $this->tonggia -= $this->sanpham[$id]['don_gia_ban'];
        unset($this->sanpham[$id]);
    }

    public function UpdateItemCart($id, $tong) {
        $this->tongsoluong -= $this->sanpham[$id]['so_luong'];
        $this->tonggia -= $this->sanpham[$id]['don_gia_ban'];

        $this->sanpham[$id]['so_luong'] = $tong;
        $this->sanpham[$id]['don_gia_ban'] = $tong * $this->sanpham[$id]['sanphamInfo']->don_gia_ban;

        $this->tongsoluong += $this->sanpham[$id]['so_luong'];
        $this->tonggia += $this->sanpham[$id]['don_gia_ban'];
    }
}
