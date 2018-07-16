<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tag',
            function (Blueprint $table) {
                $table->integer('tag_id', true)->unsigned();
                $table->integer('tag_user')->unsigned();
                $table->string('tag_name', 16);
                $table->timestamps();
            }
        );

        Schema::table(
            'tag',
            function ($table) {
                $table
                    ->foreign('tag_user', 'fk_02')
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
        Schema::dropIfExists('tag');
    }
}
