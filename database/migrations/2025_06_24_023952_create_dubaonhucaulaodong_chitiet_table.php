<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDubaonhucaulaodongChitietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dubaonhucaulaodong_chitiet', function (Blueprint $table) {
            $table->id();
            $table->string('madubao')->nullable();
            $table->string('phanloai')->nullable();
            $table->string('madonvi')->nullable();
            $table->string('tendonvi')->nullable();
            $table->string('masodn')->nullable();
            $table->string('tendv')->nullable();
            $table->string('tennguon')->nullable();
            $table->string('madmtgktct2')->nullable();
            $table->string('tentgktct2')->nullable();
            $table->string('soluong')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('dubaonhucaulaodong_chitiet');
    }
}
