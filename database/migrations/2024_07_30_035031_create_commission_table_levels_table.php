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
        Schema::create('commission_table_levels', function (Blueprint $table) {
            $table->id();
            $table->integer('level_1')->nullable();
            $table->integer('level_2')->nullable();
            $table->integer('level_3')->nullable();
            $table->integer('level_4')->nullable();
            $table->integer('level_5')->nullable();
            $table->string('enable')->nullable();

            $table->unsignedBigInteger('providers_id')->nullable();
            $table->unsignedBigInteger('product_family_id')->nullable();
            $table->unsignedBigInteger('ranks_id')->nullable();
            $table->unsignedBigInteger('distributors_organizations_id')->nullable();
            
            $table->foreign('distributors_organizations_id')->references('id')->on('distributors_organizations')->onDelete('cascade');
            $table->foreign('providers_id')->references('id')->on('providers')->onDelete('cascade');
            $table->foreign('product_family_id')->references('id')->on('product_families')->onDelete('cascade');
            $table->foreign('ranks_id')->references('id')->on('ranks')->onDelete('cascade');
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
        Schema::dropIfExists('commission_table_levels');
    }
};
