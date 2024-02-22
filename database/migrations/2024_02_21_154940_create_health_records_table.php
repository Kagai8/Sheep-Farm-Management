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
        Schema::create('health_records', function (Blueprint $table) {
            $table->id();

            $table->string('goat_id')->nullable();
            $table->string('type_treatment')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('date')->nullable();
            $table->string('notes')->nullable();
            $table->string('follow_up')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};
