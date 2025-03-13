<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('flight_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flight_id')->index();
            $table->unsignedBigInteger('pilot_id')->index();
            $table->string('number'); // Číslo letu
            $table->date('date_flights'); // Datum letu
            $table->time('start_time'); // Čas vzletu
            $table->time('end_time'); // Čas přistání
            $table->string('start_location'); // Místo vzletu
            $table->string('end_location'); // Místo přistání

            // Informace o posádce
            $table->string('pilot_name');
            $table->string('license'); // Číslo licence
            $table->text('crew')->nullable(); // Pomocníci na startu/přistání

            // Informace o pasažérech
            $table->integer('passenger_count');
            $table->text('passenger_names')->nullable();

            // Informace o balónu
            $table->string('registration'); // Registrační číslo balónu
            $table->string('balloon_model'); // Model balónu
            $table->integer('hours'); // Počet provozních hodin
            $table->integer('fuel'); // Spotřeba plynu v litrech

            // Meteorologické podmínky
            $table->integer('temperature'); // Teplota vzduchu
            $table->string('wind'); // Směr a rychlost větru
            $table->integer('visibility'); // Viditelnost v km
            $table->string('weather'); // Stav oblohy (jasno, oblačno, zataženo, mlha)

            // Průběh letu
            $table->text('flight_description'); // Popis letu
            $table->integer('max_altitude'); // Maximální výška (m)
            $table->integer('distance'); // Uražená vzdálenost (km)

            // Přistání
            $table->string('landing'); // Typ přistání
            $table->text('landing_location')->nullable(); // Přesnost přistání

            // Bezpečnostní informace
            $table->text('incident')->nullable(); // Incidenty nebo nehody

            // Logistika
            $table->text('return')->nullable(); // Způsob návratu balónu

            $table->timestamps();

            // Cizí klíče
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->foreign('pilot_id')->references('id')->on('pilots')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('flight_records');
    }
};
