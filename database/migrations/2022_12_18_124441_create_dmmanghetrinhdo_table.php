<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmmanghetrinhdoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmmanghetrinhdo', function (Blueprint $table) {
            $table->id();
            $table->string('manghe')->nullable();
            $table->string('madmmntd')->nullable();
            $table->string('tenmntd')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('mota')->nullable();
            $table->integer('stt')->nullable();
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
        Schema::dropIfExists('dmmanghetrinhdo');
    }
}
