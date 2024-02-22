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
        Schema::create('goat_profiles', function (Blueprint $table) {
            $table->id();
            
            $table->string('goat_id')->nullable();
            $table->string('ram_id')->nullable();
            $table->string('ewe_id')->nullable();
            $table->string('breed_id')->nullable();
            $table->string('goat_color')->nullable();
            $table->string('goat_weight')->nullable();
            $table->string('goat_height')->nullable();
            $table->string('date_born')->nullable();
            $table->string('goat_image')->nullable();
            $table->string('status')->default(1);
            $table->string('health_status')->default(1);
            $table->string('breeding_status')->default(0);
            $table->string('created_by')->nullable();
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goat_profiles');
    }
};
