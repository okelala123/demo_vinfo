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
        Schema::create('customer_notifications', function (Blueprint $table) {
            $table->id();
            $table->enum('send_email', ['active', 'inactive'])->nullable();
            $table->enum('allow_send_sms', ['active', 'inactive'])->nullable();
            $table->enum('is_from_provider_banrd', ['active', 'inactive'])->nullable();
            $table->string('sms_brand_name')->nullable();
            $table->string('sms_api_username')->nullable();
            $table->string('sms_api_password')->nullable();

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
        Schema::dropIfExists('customer_notifications');
    }
};
