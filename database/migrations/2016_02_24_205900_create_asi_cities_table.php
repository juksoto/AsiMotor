<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_cities', function (Blueprint $table) {
            $table->increments('id');

            // id país
            $table -> integer('country_id') -> unsigned();
            $table -> foreign('country_id') -> references('id') -> on('asi_countries') -> onDelete('cascade');

            $table -> string('city');
            $table -> boolean('active') ->default(true);

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asi_cities');
    }
}
