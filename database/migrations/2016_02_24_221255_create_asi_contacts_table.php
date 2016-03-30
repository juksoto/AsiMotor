<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_contacts', function (Blueprint $table) {
            $table -> increments('id');

            // id company
            $table -> integer('company_id') -> unsigned() -> nullable();
            $table -> foreign('company_id') -> references('id') -> on('asi_companies') -> onDelete('cascade');

            // id person
            $table -> integer('person_id') -> unsigned() -> nullable();
            $table -> foreign('person_id') -> references('id') -> on('asi_people') -> onDelete('cascade');

            // id vehiculo
            $table -> integer('user_id') -> unsigned();
            $table -> foreign('user_id') -> references('id') -> on('asi_users') -> onDelete('cascade');

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
        Schema::drop('asi_contacts');
    }
}
