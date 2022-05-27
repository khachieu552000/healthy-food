<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nhan_vien_id')->unsigned()->nullable();
            // $table->foreign('nhan_vien_id')->references('id')->on('nhan_vien');
            $table->integer('khach_hang_id')->unsigned();
            // $table->foreign('khach_hang_id')->references('id')->on('khach_hang');
            $table->datetime('ngay_lap');
            $table->double('tong_tien');
            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoa_don');
    }
}
