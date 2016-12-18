<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectStrandsAndTwines extends Migration
{
    /**
    * Run the migrations.
    */
    public function up()
    {
        Schema::table('strands', function (Blueprint $table) {

            # Add a new INT field called `twine_id` which is unsigned.
            $table->integer('twine_id')->unsigned();

            # The field `twine_id` is a FK that connects to the `id` field in `twines` table
            $table->foreign('twine_id')->references('id')->on('twines');//remove s from 'twines'?

        });
    }



    /**
    * Reverse the migrations.
    */
    public function down()
    {
        Schema::table('strands', function (Blueprint $table) {

            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('strands_twine_id_foreign');

            $table->dropColumn('twine_id');
        });
    }
}
