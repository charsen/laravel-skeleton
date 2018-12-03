<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 用户
 *
 * @description 存储用户信息
 *
 * @author Charsen
 * @date   2018-12-04 00:00:13
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32)->default('')->comment('用户名');
            $table->string('mobile', 32)->nullable()->comment('手机号码');
            $table->string('email', 128)->default('')->comment('邮箱');
            $table->timestamp('email_verified_at')->comment('邮箱验证于');
            $table->string('password', 128)->default('')->comment('密码');
            $table->string('remember_token', 100)->default('')->comment('记住Token');
            $table->softDeletes();
            $table->timestamps();

            $table->unique('name', 'name');
            $table->unique('email', 'email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
