<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->string('business');
            $table->string('logo')->default('logo_unknown.png');
            $table->boolean('status')->default(0);
            $table->string('country');
            $table->string('code_zip');
            $table->string('state');
            $table->string('population');
            $table->string('adress');
            $table->string('email')->unique();
            $table->string('web');
            $table->string('whatsapp');
            $table->string('skype');
            $table->string('phone');
            $table->string('color_primary');
            $table->text('description')->nullable();
            $table->date('subscription');
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
        Schema::dropIfExists('business');
    }
}
