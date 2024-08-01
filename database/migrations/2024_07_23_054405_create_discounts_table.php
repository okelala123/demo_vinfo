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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['daily', 'monthly','yearly','6_months','quarterly','trip','percent'])->nullable();
            $table->float('type_discount')->nullable();
            $table->float('type_value')->nullable();
            $table->float('quantity_discount')->nullable();
            $table->float('quantity_value')->nullable();

            $table->unsignedBigInteger('products_id')->nullable();
            $table->unsignedBigInteger('prices_id')->nullable();

            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('prices_id')->references('id')->on('prices')->onDelete('cascade');
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
        Schema::dropIfExists('discounts');
    }
};
