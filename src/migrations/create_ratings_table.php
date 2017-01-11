<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration
{
    
    /**
     * Run the migration
     */
    public function up()
    {
        Schema::create('ratings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->morphs('rateable');
            $table->index('rateable_id');
            $table->index('rateable_type');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migration
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}