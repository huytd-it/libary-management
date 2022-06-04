<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tac_gias', function (Blueprint $table) {
            $table->id('ma_tac_gia');
            $table->string('ten_tac_gia');
            $table->string('gioi_thieu');

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
        Schema::dropIfExists('tac_gias');
    }
}
