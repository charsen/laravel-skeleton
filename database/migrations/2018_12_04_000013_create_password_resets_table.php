<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 重置密码
 *
 * @description 存储用户重置密码信息
 *
 * @author Charsen
 * @date   2018-12-04 00:00:13
 */
class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email', 128)->default('')->comment('邮箱');
            $table->string('token', 100)->default('')->comment('Token');
            $table->timestamp('created_at')->comment('创建于');

            $table->unique('name', 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
