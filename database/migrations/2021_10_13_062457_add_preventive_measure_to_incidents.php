<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreventiveMeasureToIncidents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incidents', function (Blueprint $table) {
            $table->text('preventive_measure')->nullable();
            $table->string('finding_level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incidents', function (Blueprint $table) {
            //
        });
    }
}
