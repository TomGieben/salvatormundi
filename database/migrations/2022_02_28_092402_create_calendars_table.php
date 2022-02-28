<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_article_id');
            $table->foreign('news_article_id')->references('id')->on('news_articles');
            $table->string('slug');
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_at');
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
        Schema::dropIfExists('calendar_items');
    }
}
