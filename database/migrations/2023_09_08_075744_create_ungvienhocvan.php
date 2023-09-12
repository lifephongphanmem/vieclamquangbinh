<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUngvienhocvan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ungvienhocvan', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->string('chuyennganh')->nullable();
            $table->string('truong')->nullable();
            $table->string('bangcap')->nullable();
            $table->string('tungay')->nullable();
            $table->string('denngay')->nullable();
            $table->string('thanhtuu')->nullable();
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
        Schema::dropIfExists('ungvienhocvan');
    }
}
