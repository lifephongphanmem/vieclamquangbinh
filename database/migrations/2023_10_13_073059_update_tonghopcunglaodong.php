<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTonghopcunglaodong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tonghopcunglaodong', function (Blueprint $table) {
            $table->string('trongnuoc')->default(0);
            $table->string('nuocngoai')->default(0);
            $table->string('hocnghe')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tonghopcunglaodong', function (Blueprint $table) {
            $table->dropColumn('trongnuoc');
            $table->dropColumn('nuocngoai');
            $table->dropColumn('hocnghe');
        });
    }
}
