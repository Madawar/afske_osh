<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->date('doneOn');
            $table->bigInteger('auditee')->nullable();
            $table->string('audit_name')->nullable();
            $table->string('audit_no')->nullable();
            $table->string('audit_entity')->nullable();
            $table->bigInteger('department')->unsigned();
            $table->text('interviewed')->nullable();
            $table->text('other_details')->nullable();
            $table->bigInteger('checklistId')->unsigned();
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
        Schema::dropIfExists('audits');
    }
}
