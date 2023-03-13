<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDonvinhanthongbaoTableV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donvinhanthongbao', function (Blueprint $table) {
            $table->integer('isRead')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donvinhanthongbao', function (Blueprint $table) {
            $table->dropColumn('isRead');
        });
    }
}
