<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Composer;
use App\Models\DanhMuc;
use App\Models\Carts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->Composer('pages.layouts.header', function($view){
            $danhmuc = DanhMuc::all();
            $view->with('danhmuc',$danhmuc);
        });
        view()->Composer('pages.layouts.header', function($view){
            $carts = Session('Carts');
        //     foreach($carts as $key => $value){
        //         foreach($value as $key=>$val){
        //         $count = count($val);
        //         }
        // }
        if($carts != Null){
        $count = count($carts->sanpham);
        }
        else{
            $count = 0;
        }
            $view->with('count',$count);
        });


    }
}
