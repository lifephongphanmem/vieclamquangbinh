<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanphonghotroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanphonghotro', function (Blueprint $table) {
            $table->id();
            $table->string('maso')->unique();
            $table->string('vanphong')->nullable();
            $table->string('hoten')->nullable();
            $table->string('chucvu')->nullable();
            $table->string('sdt')->nullable();
            $table->string('skype')->nullable();
            $table->string('facebook')->nullable();
            $table->integer('sapxep')->default(99);
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
        Schema::dropIfExists('vanphonghotro');
    }
}
