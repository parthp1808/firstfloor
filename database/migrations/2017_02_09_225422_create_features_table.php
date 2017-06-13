<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            
        });
         // Insert some stuff
        DB::table('features')->insert(
            array('id' => '1','name' => "Air Conditioner")
        );
        DB::table('features')->insert(
            array('id' => '2','name' => "Heating")
        );
        DB::table('features')->insert(
            array('id' => '3','name' => "Garden")
        );
        DB::table('features')->insert(
            array('id' => '4','name' => "Garage")
        );
        DB::table('features')->insert(
            array('id' => '5','name' => "Basement")
        );
        DB::table('features')->insert(
            array('id' => '6','name' => "Security System")
        );

        DB::table('features')->insert(
            array('id' => '7','name' => "Kitchen")
        );
        DB::table('features')->insert(
            array('id' => '8','name' => "Balcony")
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
