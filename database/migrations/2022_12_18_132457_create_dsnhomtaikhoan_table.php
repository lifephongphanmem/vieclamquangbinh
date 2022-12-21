<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDsnhomtaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsnhomtaikhoan', function (Blueprint $table) {
            $table->id();
            $table->integer('stt')->default(1);
            $table->string('manhomchucnang',50)->nullable();
            $table->string('tennhomchucnang',50)->nullable();           
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
        Schema::dropIfExists('dsnhomtaikhoan');
    }
}
