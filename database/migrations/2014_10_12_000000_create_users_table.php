<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'user',
            function (Blueprint $table) {
                $table->integer('user_id', true)->unsigned();
                $table->string('first_name', 64);
                $table->string('last_name', 64);
                $table->string('username', 32)->unique();
                $table->string('email', 64)->unique();
                $table->string('password', 64);
                $table->rememberToken();
                $table->timestamps();
            }
        );
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
