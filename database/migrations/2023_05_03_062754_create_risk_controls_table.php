<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_controls', function (Blueprint $table) {
            $table->id();
            $table->string('exisitng_control_measures');
            $table->string('action_plan');
            $table->string('person_in_charge');
            $table->string('time_frame');
            $table->string('status');
            $table->foreignId('aspect_impact_form_id')
            ->constrained('aspect_impact_forms')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('risk_controls');
    }
};
