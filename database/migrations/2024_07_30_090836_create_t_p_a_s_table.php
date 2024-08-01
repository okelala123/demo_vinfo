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
        Schema::create('t_p_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('tpa_code')->nullable();
            $table->string('tpa_logo')->nullable();
            $table->string('tpa_name')->nullable();
            $table->string('tpa_email')->nullable();
            $table->integer('tpa_phone')->nullable();
            $table->string('tpa_desc')->nullable();



            
            $table->unsignedBigInteger('product_family_id')->nullable();
            $table->unsignedBigInteger('providers_id')->nullable();

            $table->foreign('product_family_id')->references('id')->on('product_families')->onDelete('cascade');
            $table->foreign('providers_id')->references('id')->on('providers')->onDelete('cascade');
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
        Schema::dropIfExists('t_p_a_s');
    }
};
