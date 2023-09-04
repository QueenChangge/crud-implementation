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
        // kalau mau rename column karena perlu pustaka dbal makanya jalanin require doctrine/dbal
        Schema::table('experiences', function (Blueprint $table) {
            $table->renameColumn('responsibilities', 'responsibility_1');
            $table->string('responsibilitiy_2');
            $table->string('responsibilitiy_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn('responsibilitiy_2');
            $table->dropColumn('responsibilitiy_3');
            $table->renameColumn('responsibility_1', 'responsibilities');

            
            
        });
    }
};
