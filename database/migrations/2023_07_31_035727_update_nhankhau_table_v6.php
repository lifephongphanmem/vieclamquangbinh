<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNhankhauTableV6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nhankhau', function (Blueprint $table) {
            $table->string('thitruonglamviec')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nhankhau', function (Blueprint $table) {
            $table->dropColumn('thitruonglamviec');
        });
    }
}
