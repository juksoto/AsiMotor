<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_works', function (Blueprint $table) {
            $table -> increments('id');

            $table -> string('number_identification');
            $table -> string('title') -> nullable();
            $table -> mediumText('description_short') -> nullable();
            $table -> date('date') -> nullable();
            $table -> longText('observations') -> nullable();
            $table -> longText('notes') -> nullable();
            $table -> string('url_pdf') -> nullable();

            // id vehicle
            $table -> integer('vehicle_id') -> unsigned();
            $table -> foreign('vehicle_id') -> references('id') -> on ('asi_vehicles') -> onDelete('cascade');

            // id work descriptions
            $table -> integer('work_descriptions_id') -> unsigned();
            $table -> foreign('work_descriptions_id') -> references('id') -> on ('asi_work_descriptions') -> onDelete('cascade');

            // id work type
            $table -> integer('work_types_id') -> unsigned();
            $table -> foreign('work_types_id') -> references('id') -> on ('asi_work_types') -> onDelete('cascade');

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
        Schema::drop('asi_works');
    }
}
