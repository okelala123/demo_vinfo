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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('catalog_id')->nullable();
            $table->string('name')->nullable();
            $table->text('desc')->nullable();
            $table->text('address')->nullable();
            $table->string('company_information')->nullable();
            $table->string('business_licence_number')->nullable();

            $table->timestamps();
            $table->foreign('catalog_id')->references('id')->on('catalogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
};
