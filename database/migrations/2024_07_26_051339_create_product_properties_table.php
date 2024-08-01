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
        Schema::create('product_properties', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->integer('price')->nullable();
            $table->float('percent')->nullable();
            $table->float('benefit_amount')->nullable();
            $table->float('position')->nullable();
            $table->float('sku')->nullable();
            $table->float('precheck')->nullable();
            $table->enum('type', ['active', 'inactive'])->nullable();

            $table->unsignedBigInteger('product_options_id')->nullable();
            $table->foreign('product_options_id')->references('id')->on('product_options')->onDelete('cascade');

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
        Schema::dropIfExists('product_properties');
    }
};