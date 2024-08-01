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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name')->nullable();
            $table->string('group_code')->nullable();
         


            $table->unsignedBigInteger('distributors_id')->nullable();
            $table->unsignedBigInteger('current_distributor_id')->nullable();
            $table->unsignedBigInteger('default_distributor_id')->nullable();

            $table->foreign('distributors_id')->references('id')->on('distributors_organizations')->onDelete('cascade');
            $table->foreign('current_distributor_id')->references('id')->on('distributors_organizations')->onDelete('cascade');
            $table->foreign('default_distributor_id')->references('id')->on('distributors_organizations')->onDelete('cascade');
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
        Schema::dropIfExists('groups');
    }
};
