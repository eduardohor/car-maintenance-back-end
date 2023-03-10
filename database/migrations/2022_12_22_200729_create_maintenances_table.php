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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->foreignId('vehicle_id')
            ->constrained()
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->string('problem_presented');
            $table->string('type_of_maintenance');
            $table->date('scheduling');
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
        Schema::dropIfExists('maintenances');
    }
};
