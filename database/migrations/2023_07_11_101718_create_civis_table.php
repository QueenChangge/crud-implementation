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
        Schema::create('civis', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('aboutme');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('gender');
            $table->string('weight');
            $table->string('hight');
            $table->string('religion');
            $table->string('marital_status');
            $table->string('target_position');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('civis');
    }
};
