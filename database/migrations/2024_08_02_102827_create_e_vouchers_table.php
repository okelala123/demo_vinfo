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
        Schema::create('e_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('campaign')->nullable();
            $table->string('code')->nullable();
            $table->string('encrypted_code')->nullable();
            $table->string('product_code')->nullable();
            $table->string('percent')->nullable();
            $table->string('max_min')->nullable();
            $table->string('product_name')->nullable();
            $table->string('status')->nullable();
            $table->string('oder_no')->nullable();
            $table->string('reusable')->nullable();
            $table->string('evoucher_for_zalo_mini_app')->nullable();
            $table->string('qr_code_base_url')->nullable();
            $table->string('apply_to_all_products')->nullable();
            $table->string('quantity')->nullable();
            $table->string('start_from')->nullable();
            $table->string('start_to')->nullable();



            $table->unsignedBigInteger('product_family_id')->nullable();
            $table->unsignedBigInteger('providers_id')->nullable();
            $table->unsignedBigInteger('rank_id')->nullable();
            $table->unsignedBigInteger('distributors_organizations_id')->nullable();
            $table->unsignedBigInteger('zalo_mini_app_id')->nullable();

            $table->foreign('distributors_organizations_id')->references('id')->on('distributors_organizations')->onDelete('cascade');
            $table->foreign('product_family_id')->references('id')->on('product_families')->onDelete('cascade');
            $table->foreign('providers_id')->references('id')->on('providers')->onDelete('cascade');
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->foreign('zalo_mini_app_id')->references('id')->on('zalo_mini_apps')->onDelete('cascade');
            $table->string('update_time')->nullable();

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
        Schema::dropIfExists('e_vouchers');
    }
};
