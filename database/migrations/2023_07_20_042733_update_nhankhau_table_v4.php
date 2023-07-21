<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNhankhauTableV4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nhankhau', function (Blueprint $table) {
            $table->integer('doituongtimvieclam')->default(2);
            $table->integer('vieclammongmuon')->default(1);
            $table->string('nganhnghemongmuon')->nullable();
            $table->string('nganhnghemuonhoc')->nullable();
            $table->string('trinhdochuyenmonmuonhoc')->nullable();
            $table->string('sdt')->nullable();
            $table->integer('khuvuc')->default(1);
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
            $table->dropColumn('doituongtimvieclam');
            $table->dropColumn('vieclammongmuon');
            $table->dropColumn('nganhnghemongmuon');
            $table->dropColumn('nganhnghemuonhoc');
            $table->dropColumn('trinhdochuyenmonmuonhoc');
            $table->dropColumn('sdt');
            $table->dropColumn('khuvuc');
        });
    }
}
