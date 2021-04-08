<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('audit_id')->unsigned();
            $table->bigInteger('checklist_id')->unsigned();
            $table->text('item');
            $table->string('subcategory')->nullable();
            $table->text('finding')->nullable();
            $table->text('root_cause')->nullable();
            $table->text('root_cause_correction')->nullable();
            $table->integer('root_cause_correction_by')->nullable();
            $table->date('root_cause_correction_date')->nullable();
            $table->boolean('root_cause_correction_review')->default(0);
            $table->text('root_cause_correction_review_remarks')->nullable();
            $table->text('root_cause_correction_review_by')->nullable();
            $table->boolean('closed')->default(0);
            $table->string('required_response')->nullable();
            $table->string('response')->nullable();
            $table->string('capa_number')->nullable();
            $table->string('conformity_level')->nullable();
            $table->boolean('non_conformity')->default(0);
            $table->json('evidence')->nullable();
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
        Schema::dropIfExists('audit_items');
    }
}
