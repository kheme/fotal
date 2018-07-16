<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapPhotoTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'map_photo_tag',
            function (Blueprint $table) {
                $table->integer('map_id', true)->unsigned();
                $table->integer('photo_id')->unsigned();
                $table->integer('tag_id')->unsigned();
                $table->timestamps();
            }
        );

        Schema::table(
            'map_photo_tag',
            function ($table) {
                $table
                    ->foreign('photo_id', 'fk_05')
                    ->references('photo_id')
                    ->on('photo')
                    ->onUpdate('cascade');

                $table
                    ->foreign('tag_id', 'fk_06')
                    ->references('tag_id')
                    ->on('tag')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('map_photo_tag');
    }
}
