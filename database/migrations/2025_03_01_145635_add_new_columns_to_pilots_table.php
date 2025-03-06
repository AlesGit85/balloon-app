<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pilots', function (Blueprint $table) {
            $table->date('vacation_date_from')->nullable()->after('user_ID'); // Přidá sloupec "vacation_date_from" za "user_ID"
            $table->date('vacation_date_to')->nullable()->after('vacation_date_from'); // Přidá sloupec "vacation_date_to" za "vacation_date_from"
        });
    }

    public function down()
    {
        Schema::table('pilots', function (Blueprint $table) {
            $table->dropColumn(['vacation_date_from', 'vacation_date_to']); // Odebrání sloupců při rollbacku
        });
    }
};
