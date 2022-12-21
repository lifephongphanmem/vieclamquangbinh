<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDmhanhchinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('danhmuchanhchinh', function (Blueprint $table) {
            $table->string('madvql',50)->nullable();
            $table->string('madb')->nullable()->after('id');
            $table->string('capdo')->nullable();//ADMIN; T; H; X
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('danhmuchanhchinh', function (Blueprint $table) {
            //
        });
    }
}
