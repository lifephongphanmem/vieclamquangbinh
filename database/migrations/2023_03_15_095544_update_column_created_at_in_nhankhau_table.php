<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnCreatedAtInNhankhauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nhankhau', function (Blueprint $table) {
            $table->string('truongbiendong')->nullable();
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
        Schema::table('nhankhau', function (Blueprint $table) {
            $table->dropColumn('truongbiendong');
            // $table->dropColumn('truongbiendong');
        });
    }
}
