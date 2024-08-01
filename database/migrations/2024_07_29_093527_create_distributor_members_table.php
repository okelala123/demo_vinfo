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
        Schema::create('distributor_members', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable(); 
            $table->string('email')->nullable();

            $table->string('parent_saleman')->nullable();
            $table->integer('saleman_level')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('IdentityType')->nullable();
            $table->string('id_taxcode')->nullable();
            $table->string('is_freelancer')->nullable();
            $table->string('password')->nullable();
            $table->string('generate_mini_app_qr')->nullable();
            $table->string('provider_distributor_code')->nullable();
            $table->string('agency_code')->nullable();
            $table->string('employee_code')->nullable();
            $table->string('bank')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();



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
        Schema::dropIfExists('distributor_members');
    }
};
