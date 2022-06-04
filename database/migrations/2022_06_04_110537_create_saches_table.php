<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saches', function (Blueprint $table) {
            $table->id('ma_sach');
            $table->string('ten_sach');
            $table->string('ma_tac_gia');
            $table->string('ma_trang_thai');
            $table->string('ma_nxb');
            $table->string('ma_loai');
            $table->integer('gia_tri');
            $table->string('ma_nhan_vien');


            $table->string('create_by');
            $table->string('update_by');
            $table->softDeletes();
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
        Schema::dropIfExists('saches');
    }
}
