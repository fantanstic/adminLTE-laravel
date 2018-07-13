<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->unique()->comment('日期');
            $table->integer('dayActive')->default(0)->comment('日活');
            $table->integer('newUser')->default(0)->comment('新增用户utc');
            $table->integer('publishTaskCount')->default(0)->comment('发的总任务数');
            $table->integer('completeTaskCount')->default(0)->comment('做的总任务数');
            $table->integer('videoCoinCount')->default(0)->comment('看视频金币总数');
            $table->integer('paidUser')->default(0)->comment('付费用户utc');
            $table->integer('newPaidUser')->default(0)->comment('新增付费用户');
            $table->integer('newPaidCount')->default(0)->comment('新增付费用户付费');
            $table->string('payRate')->default('')->comment('付费率');
            $table->integer('dailyGains')->default(0)->comment('当天总收入');
            $table->string('arpu')->default('')->comment('当日总收入/日活');
            $table->integer('payCount')->default(0)->comment('充值次数');
            $table->string('arppu')->default('')->comment('当日总收入/付费用户数');
            $table->integer('loginCount')->default(0)->comment('登录次数');
            $table->string('loginCountAvg')->default(0)->comment('平均登录次数');
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
        Schema::dropIfExists('total_infos');
    }
}
