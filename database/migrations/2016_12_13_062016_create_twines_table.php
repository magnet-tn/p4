<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up() {

         Schema::create('twines', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();
             $table->string('type');//will become a foreign key
             $table->string('title');
             $table->string('author')->nullable();//will go away with many-many authors rel'shp
             $table->text('strand');//will go away with many-many strands rel'shp

         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('twines');
    }
}
