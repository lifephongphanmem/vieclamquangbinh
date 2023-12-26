<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVitrituyedungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vitrituyendung', function (Blueprint $table) {
            $table->string('anhtuyendung')->nullable();
            $table->string('anhdontuyendung')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vitrituyendung', function (Blueprint $table) {
            $table->dropColumn('anhtuyendung');
            $table->dropColumn('anhdontuyendung');
        });
    }
}
