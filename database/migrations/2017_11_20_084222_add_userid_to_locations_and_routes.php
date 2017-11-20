<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUseridToLocationsAndRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('routes', function ($table) {
            $table->string('user_id');
        });
        Schema::table('locations', function ($table) {
            $table->string('user_id');
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
        Schema::table('routes', function ($table) {
            $table->dropColumn('user_id');
        });
        Schema::table('locations', function ($table) {
            $table->dropColumn('user_id');
        });
    }
}
