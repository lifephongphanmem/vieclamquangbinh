<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHopthuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hopthu', function (Blueprint $table) {
            $table->id();
            $table->string('tieude')->nullable();
            $table->string('noidung')->nullable();
            $table->string('file')->nullable();
            $table->string('madv')->nullable();
            $table->string('thoigiangui')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('trangthai')->default('DAGUI');
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
        Schema::dropIfExists('hopthu');
    }
}
