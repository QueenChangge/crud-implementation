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
        Schema::table('civis', function (Blueprint $table) {
            $table->longText('aboutme')->default('I am a person with more than 10 years experiences in hospitality industry. Able to prioritize safety in the Restaurants, Bars and Kitchens while upholding high standards for the whole operations. Takes direction well and can work under extreme pressure while maintaining a positive attitude. Passionate about pursuing a career in the hospitality industry.')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('civis', function (Blueprint $table) {

            
        });
    }
};
