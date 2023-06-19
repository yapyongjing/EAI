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
        Schema::create('opr_forms', function (Blueprint $table) {
            $table->id();
            $table->string('operating_name');
            $table->string('location_name');
            $table->date('date');
            $table->string('prepared_by');
            $table->string('checked_by');
            $table->string('approved_by');
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
        Schema::dropIfExists('opr_forms');
    }
};
