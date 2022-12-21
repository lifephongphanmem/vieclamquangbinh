<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChucnangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chucnangs', function (Blueprint $table) {
            $table->id();
            $table->string('maso')->nullable();
            $table->string('tencn')->nullable();
            $table->integer('parent')->default(1);
            $table->integer('capdo')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('machucnang_goc')->nullable();
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
        Schema::dropIfExists('chucnangs');
    }
}
