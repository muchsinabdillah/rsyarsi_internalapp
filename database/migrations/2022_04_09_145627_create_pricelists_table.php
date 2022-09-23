<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricelists', function (Blueprint $table) {
            $table->id();
            $table->integer('id_packet');
            $table->string('name_packet');
            $table->string('id_village_start');
            $table->string('name_village_start');
            $table->string('id_village_end');
            $table->string('name_village_end');
            $table->double('price');
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
        Schema::dropIfExists('pricelists');
    }
}
