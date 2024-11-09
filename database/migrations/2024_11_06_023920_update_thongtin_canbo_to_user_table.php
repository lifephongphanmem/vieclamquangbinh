<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateThongtinCanboToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ngaysinh')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('cccd')->nullable();
            $table->string('mataikhoan')->nullable();
            $table->string('sdt')->nullable();
            $table->string('diachi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ngaysinh');
            $table->dropColumn('gioitinh');
            $table->dropColumn('cccd');
            $table->dropColumn('mataikhoan');
            $table->dropColumn('sdt');
            $table->dropColumn('diachi');
        });
    }
}
