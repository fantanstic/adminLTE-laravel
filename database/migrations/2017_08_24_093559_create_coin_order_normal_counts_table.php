<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinOrderNormalCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_order_normal_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->default('1970-01-01')->comment('日期');
            $table->integer('version1_count')->default(0)->comment('version1请求总数统计');
            $table->integer('version2_count')->default(0)->comment('version2请求总数统计');
            $table->timestamp('updated_at')->nullable()->comment('最后一次请求的时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coin_order_normal_counts');
    }
}
