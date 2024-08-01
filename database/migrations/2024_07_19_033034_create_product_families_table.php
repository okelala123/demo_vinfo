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
        Schema::create('product_families', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_vn')->nullable();
            $table->text('desc')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_vn')->nullable();
            $table->text('promotion_text_vn')->nullable();
            $table->text('promotion_text_en')->nullable();
            $table->unsignedBigInteger('catalog_id')->nullable();
            $table->integer('valid_after')->nullable();
            $table->string('product_family_code')->nullable();  
            $table->string('position')->nullable();
            $table->string('product_family_banner')->nullable();
            $table->string('product_family_banner_promotion')->nullable();
            $table->string('order_template_upload')->nullable();
            $table->enum('has_beneficiary', ['active', 'inactive'])->default('inactive');
            $table->enum('is_allow_send_sms', ['active', 'inactive'])->default('inactive');
            $table->enum('is_disable_reminder', ['active', 'inactive'])->default('inactive');
            $table->text('sms_content')->nullable();
            $table->timestamps();

            $table->foreign('catalog_id')->references('id')->on('catalogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_families');
    }
};
