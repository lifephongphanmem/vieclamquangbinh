<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUngvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ungvien', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            // $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('hoten')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('phone')->nullable();
            $table->string('tinh')->nullable();
            $table->string('huyen')->nullable();
            $table->string('xa')->nullable();
            $table->string('address')->nullable();
            $table->string('chucdanh')->nullable();
            $table->string('honnhan')->nullable();
            $table->string('hinhthuclv')->nullable();
            $table->string('luong')->nullable();
            $table->string('trinhdocmkt')->nullable();
            $table->string('word')->nullable();
            $table->string('excel')->nullable();
            $table->string('powerpoint')->nullable();
            $table->string('gioithieu')->nullable();
            $table->string('muctieu')->nullable();
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
        Schema::dropIfExists('ungvien');
    }
}
