<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_vehicles', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('license')-> unique();
            $table -> string('vehicle_model') -> nullable();
            $table -> string('color') -> nullable();
            $table -> string('nro_identification') -> nullable();

            // id make
            $table -> integer('class_make_line_id') -> unsigned();
            $table -> foreign('class_make_line_id') -> references('id') -> on ('asi_vehicle_classes_makes_lines') -> onDelete('cascade');

            // id vehiculo
            $table -> integer('contact_id') -> unsigned();
            $table -> foreign('contact_id') -> references('id') -> on('asi_contacts') -> onDelete('cascade');

            $table -> boolean('active')->default(true);
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
        Schema::drop('asi_vehicles');
    }
}
