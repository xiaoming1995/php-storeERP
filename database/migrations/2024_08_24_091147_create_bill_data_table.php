<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_data', function (Blueprint $table) {
            $table->comment('账单');
            $table->increments('id');
            $table->decimal('amounts')->comment('金额');
            $table->tinyInteger('type')->comment('类型（0支出 1收入）');
            $table->text('remarks')->comment('备注');
            $table->date('statement_date')->comment('账单日期');
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
        Schema::dropIfExists('bill_data');
    }
};
