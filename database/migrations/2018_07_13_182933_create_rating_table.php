<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'rating',
            function (Blueprint $table) {
                $table->integer('rating_id', true)->unsigned();
                $table->integer('rating_value')->unsigned();
                $table->integer('rating_user')->unsigned();
                $table->integer('rating_photo')->unsigned();
                $table->timestamps();
            }
        );

        Schema::table(
            'rating',
            function ($table) {
                $table
                    ->foreign('rating_user', 'fk_03')
                    ->references('user_id')
                    ->on('user')
                    ->onUpdate('cascade');
                
                $table
                    ->foreign('rating_photo', 'fk_04')
                    ->references('photo_id')
                    ->on('photo')
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
        Schema::dropIfExists('rating');
    }
}
