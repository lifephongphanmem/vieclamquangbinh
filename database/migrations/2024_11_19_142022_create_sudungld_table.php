<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSudungldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sudunglaodong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('machucnang',50)->nullable();
            $table->string('company')->nullable();
            $table->integer('tong')->default(0);
            $table->string('thoigianbosung')->default(0);
            $table->string('thoigianlamviec')->default(0);
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
        Schema::dropIfExists('sudunglaodong');
    }
}
