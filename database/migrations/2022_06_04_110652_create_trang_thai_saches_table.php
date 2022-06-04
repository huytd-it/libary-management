<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrangThaiSachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trang_thai_saches', function (Blueprint $table) {
            $table->id('ma_trang_thai');
            $table->string('ten_trang_thai');


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
        Schema::dropIfExists('trang_thai_saches');
    }
}
