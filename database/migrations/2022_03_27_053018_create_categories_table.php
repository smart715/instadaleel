<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->integer("position");
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->string("icon");
            $table->boolean("is_active")->default(false);

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
        Schema::dropIfExists('categories');
    }
}
