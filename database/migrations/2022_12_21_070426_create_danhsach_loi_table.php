<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhsachLoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhsachloi', function (Blueprint $table) {
            $table->id();
            $table->string('nhankhau_id')->nullable();
            $table->string('madv')->nullable();
            $table->string('kydieutra')->nullable();
            $table->string('maloi',50)->nullable();
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
        Schema::dropIfExists('danhsachloi');
    }
}
