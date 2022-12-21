<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmtrinhdogdptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmtrinhdogdpt', function (Blueprint $table) {
            $table->id();
            $table->string('madmgdpt')->nullable();
            $table->string('tengdpt')->nullable();
            $table->string('trangthai')->nullable();
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
        Schema::dropIfExists('dmtrinhdogdpt');
    }
}
