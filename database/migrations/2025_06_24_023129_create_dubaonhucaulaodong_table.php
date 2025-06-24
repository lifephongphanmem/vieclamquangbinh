<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDubaonhucaulaodongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dubaonhucaulaodong', function (Blueprint $table) {
            $table->id();
            $table->string('madubao')->nullable();
            $table->date('thoigian')->nullable();
            $table->string('nam')->nullable();
            $table->string('noidung')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('madv')->nullable();
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
        Schema::dropIfExists('dubaonhucaulaodong');
    }
}
