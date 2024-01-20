<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoilaodongEPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoilaodongEPS', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sobaodanh')->nullable();
            $table->string('hoten')->nullable();
            $table->string('ngaysinh')->nullable();
            $table->integer('gioitinh')->default(1);
            $table->string('cccd')->nullable();
            $table->string('phanloai')->nullable();//Phân loại lao động đi làm việc ở Hàn Quốc VD: đã đi về,chưa đi....
            $table->string('doituong')->nullable();
            $table->string('nganhdkthi')->nullable();//Ngành đăng ký thi
            $table->string('nghe')->nullable();
            $table->string('sdt')->nullable();
            $table->string('thonxom')->nullable();
            $table->string('huyen')->nullable();
            $table->string('xa')->nullable();
            $table->string('tinh')->nullable();
            $table->boolean('dkhoc')->default(1);
            $table->string('nguoicapnhat')->nullable();
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
        Schema::dropIfExists('nguoilaodongEPS');
    }
}
