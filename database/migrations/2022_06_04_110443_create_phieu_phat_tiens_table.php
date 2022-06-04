<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuPhatTiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_phat_tiens', function (Blueprint $table) {
            $table->id('ma_phat_tien');
            $table->string('ma_doc_gia');
            $table->string('ma_nhan_vien');
            $table->string('ma_sach');
            $table->string('so_tien_thu');

            
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
        Schema::dropIfExists('phieu_phat_tiens');
    }
}
