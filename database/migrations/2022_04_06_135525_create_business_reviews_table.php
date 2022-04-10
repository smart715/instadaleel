<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("business_id");
            $table->unsignedBigInteger("customer_id");
            $table->integer("rating");
            $table->text("comment");
            $table->boolean("is_approved")->default(false);
            $table->boolean("is_shown")->default(false);

            $table->integer("month");
            $table->integer("year");

            $table->foreign("business_id")->references("id")->on("businesses")->onDelete("cascade");
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade");

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
        Schema::dropIfExists('business_reviews');
    }
}
