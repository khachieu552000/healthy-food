@extends('pages.layouts.layout')
@section('title')
    <title>Giỏ hàng</title>
@endsection
@section('content')
<div class="inner-header">
    <a href="{{ route('trangchu') }}"><i class="fa fa-home"></i> Home</a> /
    <a href="{{ route('pages.giohang') }}">Giỏ hàng</a>
    <div class="clearfix"></div>
</div>

<div class="container">
    <div id="content">

        <div class="table-responsive">
            <!-- Shop Products Table -->
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 10px">STT</th>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-price">Hình ảnh</th>
                        <th class="product-status">Giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-remove">Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @if (Session::has('Carts') != null && Session::get('Carts')->sanpham)
                    @php
                        $s = 1;
                    @endphp
                    @foreach (Session::get('Carts')->sanpham as $item)
                    <tr class="cart_item">
                        <td>{{ $s++ }}</td>
                        <td class="product-name">{{ $item['sanphamInfo']->ten_san_pham }}</td>
                        <td class="product-image">
                            <img src="{{ asset($item['sanphamInfo']->hinh_anh) }}" alt="" width="170px" height="150px">
                        </td>
                        <td class="product-price">
                            {{ number_format($item['sanphamInfo']->don_gia_ban) }} VNĐ
                        </td>

                        <td class="product-quantity">
                            <select name="so_luong" id="select-{{ $item['sanphamInfo']->id }}"
                                data-idselect="{{ $item['sanphamInfo']->id }}"
                                onchange="updateItemCart({{ $item['sanphamInfo']->id }})">
                                @for ($i = 1; $i <= $item['sanphamInfo']->so_luong; $i++)
                                    <option value="{{ $i }}" @if ($i == $item['so_luong']) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </td>

                        <td class="product-remove">
                            <a class="remove" onclick="deleteCart({{ $item['sanphamInfo']->id }})" title="Xoá sản phẩm"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>

                    @endforeach
                    @else
                    <tr>
                        <td></td>
                        <td style="font-size: 20px">Bạn chưa có sản phẩm nào trong giỏ hàng</td></tr>
                    @endif
                </tbody>

            </table>
            <!-- End of Shop Table Products -->
        </div>


        <!-- Cart Collaterals -->
        @if (Session::has('Carts') != null)
        <div class="cart-collaterals">
            <div class="cart-totals pull-right">
                <div class="cart-totals-row"><h5 class="cart-total-title">Thanh toán</h5></div>
                <div class="cart-totals-row"><span>Tổng số lượng: </span> <span>
                    @if (isset(Session::get('Carts')->tongsoluong))
                    {{ number_format(Session::get('Carts')->tongsoluong) }}
                    @else
                    0
                    @endif
                </span></div>
                <div class="cart-totals-row"><span>Tổng tiền: </span> <span>
                    @if (isset(Session::get('Carts')->tonggia))
                    {{ number_format(Session::get('Carts')->tonggia) }} VNĐ
                    @else
                    0
                    @endif
                </span></div>
                <div class="cart-totals-row"><a class="btn btn-success" href="{{ route('pages.getThanhtoan') }}" style="margin: 4px 80px">Đặt hàng</a></div>
            </div>

            <div class="clearfix"></div>
        </div>
        @endif
        <!-- End of Cart Collaterals -->
        <div class="clearfix"></div>

    </div> <!-- #content -->
</div> <!-- .container -->

@endsection
