<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();

            $table->integer("position")->unique();
            $table->string("title");
            $table->string("image");
            $table->longText("description");
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("business_id");
            $table->boolean("is_approved")->default(false);
            $table->boolean("is_active")->default(false);
            $table->integer("month");
            $table->integer("year");

            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade");
            $table->foreign("business_id")->references("id")->on("businesses")->onDelete("cascade");

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
        Schema::dropIfExists('offers');
    }
}
