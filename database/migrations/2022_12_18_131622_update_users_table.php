<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('madv')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('matinh')->nullable();
            $table->string('username')->nullable();
            $table->integer('phanloaitk')->default(1)->comment('1:NN,2:DN');
            $table->integer('status')->default(1)->comment('1:kichhoat,2:vohieu');
            $table->string('sadmin')->nullable();
            $table->integer('solandn')->default(1);
            $table->string('manhomchucnang')->nullable();
            $table->boolean('nhaplieu')->default(0);
            $table->boolean('tonghop')->default(0);
            $table->boolean('hethong')->default(0);
            $table->boolean('chucnangkhac')->default(0);
            $table->string('capdo',10)->nullable()->after('phanloaitk');
            $table->string('madvbc',50)->nullable();
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
            //
        });
    }
}
