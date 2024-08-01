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
        Schema::create('distributor_settings', function (Blueprint $table) {
            $table->id();
            $table->string('enable_orc')->nullable();
            $table->string('show_term_condition')->nullable();
            $table->string('commission_deduct')->nullable();
            $table->string('commission_show')->nullable();



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
        Schema::dropIfExists('distributor_settings');
    }
};
