<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectElementsAndStrands extends Migration
{
    /**
    * Run the migrations.
    */
    public function up()
    {
        Schema::table('strands', function (Blueprint $table) {

            # Add a new INT field called `element_id` which is unsigned.
            $table->integer('element_id')->unsigned();

            # The field `element_id` is a FK that connects to the `id` field in `elements` table
            $table->foreign('element_id')->references('id')->on('elements');

        });
    }



    /**
    * Reverse the migrations.
    */
    public function down()
    {
        Schema::table('strands', function (Blueprint $table) {

            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('strands_element_id_foreign');

            $table->dropColumn('element_id');
        });
    }
}
