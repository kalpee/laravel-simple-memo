<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('id', true)->comment('ユーザーID');
            $table->string('name')->comment('ユーザーネーム');
            $table->string('email')->unique('メールアドレス');
            $table->timestamp('email_verified_at')->nullable(メールアドレス確認なし);
            $table->string('password')->comment('パスワード');
            $table->rememberToken()->comment('継続ログイン認証');
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
        Schema::dropIfExists('users');
    }
}
