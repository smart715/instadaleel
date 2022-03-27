<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("image")->nullable();
            $table->string("email")->unique();
            $table->string("phone")->unique();
            $table->enum("gender",["Male"."Female","Others"]);
            $table->string("about")->nullable();
            $table->string("occupation")->nullable();
            $table->string("password");
            $table->string("address")->nullable();
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->boolean("is_otp_verified")->default(false);
            $table->boolean("is_active")->default(false);
            $table->string("last_active");

            $table->integer("month");
            $table->integer("year");

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
        Schema::dropIfExists('customers');
    }
}
