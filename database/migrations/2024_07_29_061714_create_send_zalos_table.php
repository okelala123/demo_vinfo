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
        Schema::create('send_zalos', function (Blueprint $table) {
            $table->id();
            $table->string('type_send_zalo')->nullable();
            $table->string('zalo_oa_id')->nullable();
            $table->string('zalo_api_key')->nullable();
            $table->string('zalo_api_secret')->nullable();
            $table->string('template_id')->nullable();
            $table->string('type')->nullable();

            $table->unsignedBigInteger('distributors_organizations_id')->nullable();
            $table->unsignedBigInteger('customer_notifications_id')->nullable();

            $table->foreign('distributors_organizations_id')->references('id')->on('distributors_organizations')->onDelete('cascade');
            $table->foreign('customer_notifications_id')->references('id')->on('customer_notifications')->onDelete('cascade');
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
        Schema::dropIfExists('send_zalos');
    }
};
