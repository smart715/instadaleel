<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_packages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("business_id");
            $table->unsignedBigInteger("package_id");
            $table->string("transaction_id")->unique();
            $table->double("total")->default(0);
            $table->date("expiry_date");
            $table->enum("payment_status",["Pending","Success","Cancel","Failed"]);
            $table->enum("status",["Expired","Running"]);

            $table->foreign("business_id")->references("id")->on("businesses")->onDelete("cascade");
            $table->foreign("package_id")->references("id")->on("packages")->onDelete("cascade");

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
        Schema::dropIfExists('business_packages');
    }
}
