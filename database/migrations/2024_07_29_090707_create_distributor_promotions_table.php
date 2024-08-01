<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributor_promotions', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('homepage_desktop')->nullable();
            $table->string('homepage_moblie')->nullable();
            $table->string('collection_desktop')->nullable();
            $table->string('collection_moblie')->nullable();
            $table->string('collection_icon')->nullable();
            $table->string('payment_desktop')->nullable();
            $table->string('payment_moblie')->nullable();
            $table->string('payment_icon')->nullable();

            $table->unsignedBigInteger('distributors_organizations_id')->nullable();
            $table->foreign('distributors_organizations_id')->references('id')->on('distributors_organizations')->onDelete('cascade');
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
        Schema::dropIfExists('distributor_promotions');
    }
};
