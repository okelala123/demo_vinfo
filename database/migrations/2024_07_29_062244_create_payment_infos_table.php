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
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->id();
            $table->string('enable_liabilities')->nullable();
            $table->integer('saleman_min_level')->nullable();
            $table->string('enable_wallet')->nullable();
            $table->string('type_bank')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('token_key')->nullable();
            $table->string('encrypt_key')->nullable();
            $table->string('checksum_key')->nullable();
            $table->string('website_key')->nullable();
            $table->string('checksum_secret')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('merchant_key')->nullable();
            $table->string('key')->nullable();
            $table->string('secure_secret_key')->nullable();
            $table->string('partner_code')->nullable();
            $table->string('api_key')->nullable();
            $table->string('secret_key')->nullable();

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
        Schema::dropIfExists('payment_infos');
    }
};
