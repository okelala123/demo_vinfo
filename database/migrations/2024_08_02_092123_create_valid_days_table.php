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
        Schema::create('valid_days', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->integer('valid_day_after')->nullable();

            $table->unsignedBigInteger('product_family_id')->nullable();
            $table->unsignedBigInteger('providers_id')->nullable();

            $table->foreign('product_family_id')->references('id')->on('product_families')->onDelete('cascade');
            $table->foreign('providers_id')->references('id')->on('providers')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('valid_days');
    }
};
