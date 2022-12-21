<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmdonviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmdonvi', function (Blueprint $table) {
            $table->id();
            $table->string('madv')->nullable();
            $table->string('email')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('matinh')->nullable();
            $table->string('tendv')->nullable();
            $table->string('diachi')->nullable();
            $table->string('phanloaitaikhoan')->default('SD');
            $table->string('caphanhchinh')->nullable();
            $table->string('madvcq')->nullable();
            $table->string('diadanh')->nullable();
            $table->string('chucvuky')->nullable();
            $table->string('nguoiky')->nullable();
            $table->string('ttlienhe')->nullable();
            $table->string('tendvhienthi')->nullable()->after('tendv');
            $table->string('madiaban')->nullable();
            $table->string('madvbc')->nullable();
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
        Schema::dropIfExists('dmdonvi');
    }
}
