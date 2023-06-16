<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsthatnghiep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsthatnghiep', function (Blueprint $table) {
            $table->id();
            $table->string('kydieutra')->nullable();
            $table->string('hoten')->nullable();
            $table->string('ngaysinh')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('cccd')->nullable();
            $table->string('bhxh')->nullable();
            $table->string('diachi')->nullable();
            $table->string('xa')->nullable();
            $table->string('huyen')->nullable();
            $table->string('nguyennhan')->nullable();
            $table->string('trinhdocmkt')->nullable();
            $table->string('nghenghiep')->nullable();
            $table->string('nghecongviec')->nullable();
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
        Schema::dropIfExists('dsthatnghiep');
    }
}
