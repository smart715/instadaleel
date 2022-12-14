<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("location_id");
            $table->unsignedBigInteger("category_id");

            $table->string("code")->unique();
            $table->string("name");
            $table->string("email");
            $table->string("image");
            $table->string("address");
            $table->string("contact_number");
            $table->text("short_description");
            $table->float("rating")->default(0);
            $table->text("social_links")->nullable();
            $table->string("website_link");
            $table->string("office_hour");

            $table->boolean("is_active")->default(false);
            $table->boolean("is_pinned")->default(false);
            $table->enum('status',['Expired','Running']);

            $table->integer("month");
            $table->integer("year");

            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade");
            $table->foreign("location_id")->references("id")->on("locations")->onDelete("cascade");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");

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
        Schema::dropIfExists('businesses');
    }
}
