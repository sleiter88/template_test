<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-11 02:14:11
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-23 07:31:20
 */

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('skype');
            $table->string('whatsapp')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('admin')->default(0);
            $table->enum('role', ['Manager', 'Admin', 'Super Admin'])->defatul('Manager');
            $table->boolean('status')->default(0);
            $table->bigInteger('business_id')->unsigned();
            $table->foreign('business_id')
                ->references('id')
                ->on('business')
                ->onDelete('cascade');
            $table->string('avatar')->default('profile.png');
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
