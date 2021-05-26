<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('replies', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('comment_id');
          $table->text('description')->nullable();
          $table->timestamps('date');

          $table->foreign('comment_id')->references('id')->on('comments');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
