<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_name',120);
            $table->string('phone_number', 20);
            $table->string('merchant_type', 15); 
            $table->string('merchant_person', 15);
            $table->text('address');
            $table->string('email', 150)->unique();
            $table->string('id_register', 25)->unique();
            $table->string('id_regencies', 15);
            $table->string('name_regencies', 150);
            $table->enum('status', ['Active', 'Stop'])->default('Active');
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
        Schema::dropIfExists('merchants');
    }
}
