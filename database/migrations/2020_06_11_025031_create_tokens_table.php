<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-11 04:51:23
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-11 04:51:27
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('token');
            $table->timestamp('expire_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
