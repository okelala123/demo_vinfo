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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_prefix')->nullable();
            $table->enum('is_non_billing_virtual_account', ['active', 'inactive'])->nullable();
            $table->string('allowed_account_name')->nullable();

            $table->string('base_account')->nullable();
            $table->string('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('certificate')->nullable();
            $table->string('signature_private_key')->nullable();




            $table->unsignedBigInteger('payment_info_id')->nullable();
            $table->foreign('payment_info_id')->references('id')->on('payment_infos')->onDelete('cascade');
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
        Schema::dropIfExists('banks');
    }
};
