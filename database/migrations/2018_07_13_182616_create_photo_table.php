<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'photo',
            function (Blueprint $table) {
                $table->integer('photo_id', true)->unsigned();
                $table->integer('photo_user')->unsigned();
                $table->string('photo_name', 32);
                $table->string('photo_path', 64);
                $table->boolean('photo_privacy')->unsigned()
                    ->comment('0 = private, 1 = public');
                $table->timestamps();
            }
        );

        Schema::table(
            'photo',
            function ($table) {
                $table
                    ->foreign('photo_user', 'fk_01')
                    ->references('user_id')
                    ->on('user')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('photo');
    }
}
