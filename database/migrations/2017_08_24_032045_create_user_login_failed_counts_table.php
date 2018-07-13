<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginFailedCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login_failed_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('用户名');
            $table->string('tuid')->comment('用户的tuid');
            $table->tinyInteger('version')->comment('请求的Version');
            $table->timestamp('created_at')->comment('请求时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_login_failed_counts');
    }
}
