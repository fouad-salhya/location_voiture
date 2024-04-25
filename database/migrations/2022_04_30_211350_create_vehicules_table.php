<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('model',50);
            $table->string('image')->nullable();
            $table->string('matricule',25);
            $table->string('carburant',25);
            $table->string('transmission',20);
            $table->decimal('places');
            $table->integer('climatisation');
            $table->integer('airbag');
            $table->integer('disponible');
            $table->date('premier_circulation');
            $table->date('premier_vidange');
            $table->date('dernier_vidange');
            $table->date('changement_roue');
            $table->decimal('prix');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
