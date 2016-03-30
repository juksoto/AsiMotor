<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_companies', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('name');
            $table -> string('website');
            $table -> integer('nro_identification') -> nullable();
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
        Schema::drop('asi_companies');
    }
}
