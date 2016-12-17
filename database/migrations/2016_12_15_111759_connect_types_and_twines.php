<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectTypesAndTwines extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
     {
         Schema::table('twines', function (Blueprint $table) {


             # Add a new INT field called `type_id` that has to be unsigned (i.e. positive)
             $table->integer('type_id')->unsigned();

             # This field `type_id` is a foreign key that connects to the `id` field in the `types` table
             $table->foreign('type_id')->references('id')->on('types');

         });
     }

     /**
      * Reverse the migrations.
      */
     public function down()
     {
         Schema::table('twines', function (Blueprint $table) {

             # ref: http://laravel.com/docs/migrations#dropping-indexes
             # combine tablename + fk field name + the word "foreign"
             $table->dropForeign('twines_type_id_foreign');

             $table->dropColumn('type_id');
         });
     }

}
