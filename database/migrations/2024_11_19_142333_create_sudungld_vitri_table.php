<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSudungldVitriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sudunglaodong_vitri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('machucnang')->nullable();
            $table->string('vitri')->nullable();
            $table->string('soluong')->default(0);
            $table->string('trinhdo')->default(0);
            $table->string('chuyennganh')->nullable();
            $table->string('kinhnghiem')->nullable();
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
        Schema::dropIfExists('sudunglaodong_vitri');
    }
}
