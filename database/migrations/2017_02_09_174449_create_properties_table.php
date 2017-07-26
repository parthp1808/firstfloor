<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('postal');
            $table->string('propertyType');
            $table->string('listingType');
            $table->longText('description');
            $table->float('price');
            
            $table->float('size');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('status');
            
            $table->integer('rooms');
            $table->integer('user_id'); 
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
        Schema::dropIfExists('properties');
    }
}
