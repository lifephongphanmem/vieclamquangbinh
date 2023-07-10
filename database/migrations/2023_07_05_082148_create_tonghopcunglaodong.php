<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateTonghopcunglaodong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tonghopcunglaodong', function (Blueprint $table) {
            $table->id();
            $table->string('kydieutra')->nullable();
            $table->string('madv')->nullable();
            $table->string('tendv')->nullable();
            $table->string('ldcovieclam')->nullable();
            $table->string('ldthatnghiep')->nullable();
            $table->string('ldkhongthamgia')->nullable();
            $table->string('thanhthi')->nullable();
            $table->string('nongthon')->nullable();
            $table->string('nam')->nullable();
            $table->string('nu')->nullable();
            $table->string('capdo')->nullable();
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
        Schema::dropIfExists('tonghopcunglaodong');
    }
}
