<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("customer_id");
            $table->text("image")->nullable();
            $table->longText("description");
            $table->boolean("is_approved")->default(false);
            $table->boolean("is_shown")->default(false);
            $table->unsignedBigInteger("total_like")->default(0);
            $table->unsignedBigInteger("total_comment")->default(0);

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
        Schema::dropIfExists('posts');
    }
}
