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
        Schema::create('aspect__impacts', function (Blueprint $table) {
            $table->id();
            $table->string('aspect_name');
            $table->string('impact_name');
            $table->string('requirement_name');
            $table->foreignId('work_id')
            ->constrained('works')
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
        Schema::dropIfExists('aspect__impacts');
    }
};
