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
        Schema::table('goats', function (Blueprint $table) {
            $table->dropColumn('breeding_status');
            $table->dropColumn('breed_id');
            $table->dropColumn('goat_color');
            $table->dropColumn('goat_weight');
            $table->dropColumn('goat_height');
            $table->dropColumn('date_born');
            $table->dropColumn('goat_age');
            $table->dropColumn('goat_image');
            $table->dropColumn('status');
            $table->dropColumn('health_status');
            $table->dropColumn('goat_gender');
            $table->dropColumn('goat_maturity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('goats', function (Blueprint $table) {
            //
        });
    }
};
