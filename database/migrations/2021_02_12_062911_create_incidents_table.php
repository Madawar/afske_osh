<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            //Personal Details
            $table->string('reporter');
            $table->string('incident_no')->unique()->nullable();
            $table->string('pno')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->string('reporter_email')->nullable();
            //Incident Details
            $table->date('date');
            $table->time('time');
            $table->string('location')->nullable();
            $table->string('incident_type');
            $table->string('flight')->nullable();
            $table->string('operational_impact')->nullable();
            $table->text('narration');
            $table->text('immediate_corrective_action');
            //Findings
            $table->text('root_cause')->nullable();
            $table->text('corrective_action')->nullable();
            $table->text('findings')->nullable();
            $table->string('assigned_to_email')->nullable();
            $table->string('assigned_to_name')->nullable();
            //Osh Review
            $table->string('lti')->nullable();
            $table->string('cost')->nullable();
            $table->string('risk_level')->nullable();
            $table->text('review_of_root_cause')->nullable();
            //Vehicles
            $table->json('vehicles')->nullable();
            $table->json('staff')->nullable();
            //Finalized
            $table->boolean('finalized')->default(0);
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
        Schema::dropIfExists('incidents');
    }
}
