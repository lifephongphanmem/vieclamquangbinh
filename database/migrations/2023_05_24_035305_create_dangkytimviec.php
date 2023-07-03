<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangkytimviec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangkytimviec', function (Blueprint $table) {
            $table->id();

            $table->string('kydieutra')->nullable();
            $table->string('hoten')->nullable();
            $table->string('ngaysinh')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('cccd')->nullable();
            $table->string('phone')->nullable();
            $table->string('dantoc')->nullable();
            $table->string('thuongtru')->nullable();
            $table->string('tamtru')->nullable();

            $table->string('trinhdogiaoduc')->nullable();
            $table->string('trinhdocmkt')->nullable();
            $table->string('loaithvp')->nullable();
            $table->string('tinhockhac')->nullable();
            $table->string('loaithk')->nullable();
            $table->string('ngoaingu1')->nullable();
            $table->string('chungchinn1')->nullable();
            $table->string('xeploainn1')->nullable();
            $table->string('ngoaingu2')->nullable();
            $table->string('chungchinn2')->nullable();
            $table->string('xeploainn2')->nullable();
            $table->string('kinhnghiem')->nullable();            
            $table->string('kynangmem')->nullable();
            $table->string('nguoikhuyettat')->nullable();

            $table->string('tencongviec')->nullable();
            $table->string('manghe')->nullable();
            $table->string('chucvu')->nullable();
            $table->string('loaihinhkt')->nullable();
            $table->string('loaihdld')->nullable();
            $table->string('khanangcongtac')->nullable();
            $table->string('hinhthuclv')->nullable();
            $table->string('mucdichlv')->nullable();
            $table->string('luong')->nullable();
            $table->string('hotroan')->nullable();
            $table->string('phucloi')->nullable();
            $table->string('maphien')->nullable();
            $table->string('phiengd')->nullable();
            $table->string('linhvuc')->nullable();
            $table->string('datsotuyen')->nullable();
            $table->string('nhanduocviec')->nullable();
            
            $table->string('tendn')->nullable();
            $table->string('madkkd')->nullable();
            $table->string('thoidiem')->nullable();
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
        Schema::dropIfExists('dangkytimviec');
    }
}
