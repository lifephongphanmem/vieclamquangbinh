<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUngvienkinhnghiem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ungvienkinhnghiem', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->string('quymo')->nullable();
            $table->string('linhvuc')->nullable();
            $table->string('chucdanh')->nullable();
            $table->string('ngayvao')->nullable();
            $table->string('ngaynghi')->nullable();
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
        Schema::dropIfExists('ungvienkinhnghiem');
    }
}
