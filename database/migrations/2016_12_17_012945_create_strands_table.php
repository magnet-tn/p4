<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrandsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('strands', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('strand_text');
            $table->string('author')->nullable();//will go away with many-many authors rel'shp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('strands');
    }
}
