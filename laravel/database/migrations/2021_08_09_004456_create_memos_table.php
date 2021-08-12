<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true)->comment('メモID');
            $table->longText('content')->comment('本文');
            $table->unsignedBigInteger('user_id')->comment('')ユーザーID;
            //timestampと書いてしまうと、レコード挿入時、更新時に値が入らないので、DB::rawで直接書いています
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('メモ更新日時');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'))->comment('メモ作成日時');

            // 論理削除を定義→deleted_atを自動生成
            $table->softDeletes()->comment('論理削除');

            $table->foreign('user_id')->references('id')->on('users')->comment('検索');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memos');
    }
}
