<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoMakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_makes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('video_id')->unsigned();
            $table->foreign('video_id')
                ->references('id')
                ->on('videos')
                ->onDelete('cascade');
            $table->bigInteger('option_id')->unsigned();
            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onDelete('cascade');
            $table->smallInteger('position');
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
        Schema::dropIfExists('video_makes');
    }
}
