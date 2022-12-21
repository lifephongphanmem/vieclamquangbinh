<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmtrinhdocmktTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmtrinhdokythuat', function (Blueprint $table) {
            $table->id();
            $table->string('madmtdkt')->nullable();
            $table->string('tentdkt')->nullable();
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
        Schema::dropIfExists('dmtrinhdokythuat');
    }
}
