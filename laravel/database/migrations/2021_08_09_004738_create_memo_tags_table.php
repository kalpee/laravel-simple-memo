<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoTagsTable extends Migration
{
    /**
     * メモとタグを紐づけるための中間テーブル
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('memo_id')->comment('メモID');
            $table->unsignedBigInteger('tag_id')->comment('タグID');

            $table->foreign('memo_id')->references('id')->on('memos')->comment('検索');
            $table->foreign('tag_id')->references('id')->on('tags')->comment('検索');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memo_tags');
    }
}
