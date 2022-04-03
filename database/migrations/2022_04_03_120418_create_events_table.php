<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->integer("position")->unique();
            $table->string("title");
            $table->longText("description");
            $table->string("image");
            $table->unsignedBigInteger("location_id");
            $table->string("event_location");
            $table->string("event_organizer_location");
            $table->dateTime("date_time");
            $table->boolean("is_approved")->default(false);
            $table->boolean("is_active")->default(false);
            $table->string("address");

            $table->integer("month");
            $table->integer("year");

            $table->foreign("location_id")->references("id")->on("locations")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
