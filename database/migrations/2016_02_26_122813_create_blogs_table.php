<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('blogs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('introduction')->nullable();
            $table->string('name')->nullable();
            $table->string('sex')->nullable();
            $table->string('icon')->nullable();
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
        //
        Schema::drop('blogs');
    }
}
