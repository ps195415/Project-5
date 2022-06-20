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
        Schema::create('oefeningens', function (Blueprint $table) {
            $table->id();
            $table->string('naam_NL');
            $table->string('naam_EN');
            $table->string('omschrijving_NL');
            $table->string('omschrijving_EN');
            $table->string('afbeelding')->nullable();
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
        Schema::dropIfExists('oefeningens');
    }
};
