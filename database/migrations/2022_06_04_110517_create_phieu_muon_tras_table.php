<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuMuonTrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_muon_tras', function (Blueprint $table) {
            $table->id('ma_phieu');
            $table->string('ma_doc_gia');
            $table->bigInteger('ma_sach');
            $table->dateTime('ngay_muon');
            $table->dateTime('ngay_tra')->nullable();
            $table->integer('tien_phat_ky_nay')->nullable();
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
        Schema::dropIfExists('phieu_muon_tras');
    }
}
