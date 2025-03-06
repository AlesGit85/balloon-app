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
        Schema::table('pilots', function (Blueprint $table) {
            $table->string('typ_licence')->nullable();
            $table->string('number_licence')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pilots', function (Blueprint $table) {
            $table->dropColumn(['typ_licence', 'number_licence']);
        });
    }
};
