<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('breeding_events', function (Blueprint $table) {
            $table->id();


            $table->string('ram_id')->nullable();
            $table->string('ewe_id')->nullable();
            $table->string('breeding_date')->nullable();
            $table->string('expected_pregnancy_date')->nullable();
            $table->string('actual_pregnancy_date')->nullable();
            $table->string('expected_birth_date')->nullable();
            $table->string('actual_birth_date')->nullable();
            $table->string('notes')->nullable();
            $table->string('status')->nullable();
            $table->string('created_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breeding_events');
    }
};
