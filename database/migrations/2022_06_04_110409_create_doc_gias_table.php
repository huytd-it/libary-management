<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_gias', function (Blueprint $table) {
            $table->id('ma_doc_gia');
            $table->string('ten_doc_gia');
            $table->bigInteger('ma_loai');
            $table->dateTime('ngay_sinh');
            $table->string('dia_chi');
            $table->string('email');

            $table->string('create_by');
            $table->string('update_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_gias');
    }
}
