<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentFindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_findings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('incident_factor_id')->nullable();
            $table->bigInteger('incident_id')->nullable();
            $table->string('factor');
            $table->text('corrective_action')->nullable();
            $table->json('analysis')->nullable();
            $table->date('completion_date')->nullable();
            $table->boolean('rejected')->default(0);
            $table->text('osh_remarks')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('incident_findings');
    }
}
