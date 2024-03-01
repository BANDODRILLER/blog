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
        Schema::create('create_events', function (Blueprint $table) {
            $table->id();
            $table->string('eventname');
            $table->string('eventcapacity');
            $table->string('eventlocation');
            $table->string('eventdate');
            $table->string('event_openingtime');
            $table->string('event_closingtime');
            $table->string('alias');
            $table->string('single_ticket_price');
            $table->string('partners_tickets_price');
            $table->string('group_tickets_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_events');
    }
};
