<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kybaocao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kybaocao', function (Blueprint $table) {
            $table->id();
            $table->string('kydieutra')->nullable();
            $table->string('noidung')->nullable();

            $table->string('madv_x')->nullable();
            $table->string('cqtiepnhan_x')->nullable();
            $table->string('trangthai_x')->nullable();
            $table->dateTime('thoidiem_x')->nullable();
            $table->string('lydo_x')->nullable();

            $table->string('madv_h')->nullable();
            $table->string('cqtiepnhan_h')->nullable();
            $table->string('trangthai_h')->nullable();
            $table->dateTime('thoidiem_h')->nullable();
            $table->string('lydo_h')->nullable();

            $table->string('madv_t')->nullable();
            $table->string('trangthai_t')->nullable();
            $table->dateTime('thoidiem_t')->nullable();


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
        //
    }
}
