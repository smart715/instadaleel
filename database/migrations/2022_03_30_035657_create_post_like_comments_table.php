<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostLikeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_like_comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("post_id");
            $table->text("comment")->nullable();
            $table->text("image")->nullable();
            $table->enum("type",['Like','Comment']);

            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade");
            $table->foreign("post_id")->references("id")->on("posts")->onDelete("cascade");

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
        Schema::dropIfExists('post_like_comments');
    }
}
