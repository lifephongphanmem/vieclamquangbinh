<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableDanhsach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('danhsach', function (Blueprint $table) {
            $table->integer('loi_cccd')->default(0);
            $table->integer('loi_hoten')->default(0);
            $table->integer('loi_ngaysinh')->default(0);
            $table->integer('loi_loai2')->default(0);
            $table->integer('loi_loai3')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('danhsach', function (Blueprint $table) {
            //
        });
    }
}
