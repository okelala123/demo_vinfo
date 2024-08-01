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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['dailyterm', 'monthlyterm','yearlyterm','6_monthsterm','quarterlyterm','tripterm','percentterm'])->nullable();
            $table->float('exc_tax_price')->nullable();
            $table->float('inc_tax_price')->nullable();
            $table->float('extra_price')->nullable();
            
            $table->unsignedBigInteger('products_id')->nullable();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('prices');
    }
};
