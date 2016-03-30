<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_people', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('name');
            $table -> string('last_name');
            $table -> date('date_of_birth') -> nullable();
            $table -> string('type_identification') -> nullable();
            $table -> integer('nro_identification') -> nullable();
            $table -> string('gender') -> nullable();
            $table -> string('marital_status') -> nullable();
            $table -> string('profession') -> nullable();
            $table -> string('company') -> nullable();
            $table -> string('website_company') -> nullable();
            $table -> longText('notes') -> nullable();
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
        Schema::drop('asi_people');
    }
}
