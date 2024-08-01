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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('code')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_vn')->nullable();
            $table->string('desc_en')->nullable();
            $table->string('desc_vn')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_vn')->nullable();
            $table->text('highlighted_text_en')->nullable();
            $table->text('highlighted_text_vn')->nullable();
            $table->string('valid_from')->nullable();
            $table->string('valid_to')->nullable();
            $table->string('version')->nullable();
            $table->integer('position')->nullable();
            $table->string('external_link')->nullable();
            $table->enum('activated', ['active', 'inactive'])->default('inactive');
            $table->enum('partnership', ['active', 'inactive'])->default('inactive');
            $table->enum('lead_capture', ['active', 'inactive'])->default('inactive');
            $table->enum('has_promotion', ['active', 'inactive'])->default('inactive');
            $table->integer('evaluation')->nullable();
            $table->enum('contact_us', ['active', 'inactive'])->default('inactive');
            $table->enum('vifo_choice', ['active', 'inactive'])->default('inactive');

            $table->unsignedBigInteger('product_family_id')->nullable();
            $table->unsignedBigInteger('providers_id')->nullable();
            $table->unsignedBigInteger('rank_id')->nullable();
            $table->unsignedBigInteger('commission_id')->nullable();


            $table->foreign('product_family_id')->references('id')->on('product_families')->onDelete('cascade');
            $table->foreign('providers_id')->references('id')->on('providers')->onDelete('cascade');
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->foreign('commission_id')->references('id')->on('commissions')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
};
