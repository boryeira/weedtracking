<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrowlogDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('growlog_days', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('growlog_id');
          $table->date('date');
          $table->integer('stage_id')->nullable();
          $table->integer('stage_day')->nullable();
          $table->timestamps();
      });

      Schema::create('growlog_day_images', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('growlog_day_id')->nullable();
          $table->longText('link');
          $table->timestamps();
      });

      Schema::create('growlog_day_texts', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('growlog_day_id')->nullable();
          $table->longText('content');
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
        Schema::dropIfExists('growlog_days');
        Schema::dropIfExists('growlog_day_images');
        Schema::dropIfExists('growlog_day_texts');

    }
}
