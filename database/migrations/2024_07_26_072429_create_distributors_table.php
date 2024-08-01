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
        Schema::create('distributors_organizations', function (Blueprint $table) {
            $table->id();
            $table->string("code")->nullable();
            $table->string("logo")->nullable();
            $table->string("name")->nullable();
            $table->string("email_customer_services")->nullable();
            $table->string("email_accountant")->nullable();
            $table->string("phone_1")->nullable();
            $table->string("phone_2")->nullable();
            $table->string("website")->nullable();
            $table->string("desc")->nullable();
            $table->string("accent_color")->nullable();  
            $table->string("text_color")->nullable();  
            $table->string("button_color")->nullable();  
            $table->string("ocr_provider")->nullable();  
            $table->enum('is_allow', ['active', 'inactive'])->nullable();
            $table->enum('enable', ['active', 'inactive'])->nullable();

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
        Schema::dropIfExists('distributors');
    }
};
