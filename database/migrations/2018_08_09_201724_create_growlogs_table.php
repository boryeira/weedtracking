<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrowlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('growlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
        //Etapas del ciclo de cultivo
        Schema::create('growlog_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('growlog_id');
            $table->unsignedInteger('stage_id');
            $table->date('stage_start')->nullable();
            $table->date('stage_end')->nullable();
            $table->timestamps();

            // $table->foreign('growlog_id')->references('id')->on('growlogs')->onDelete('cascade');
            // $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
        });

        //Parametricas
        //Etapas
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('class');
            $table->unsignedInteger('weight');
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
        Schema::dropIfExists('growlogs');
        Schema::dropIfExists('growlog_stages');
        Schema::dropIfExists('stages');
    }
}
