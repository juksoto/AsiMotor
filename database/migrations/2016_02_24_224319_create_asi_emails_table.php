<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_emails', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('email');
            // id contacto
            $table -> integer('contact_id') -> unsigned();
            $table -> foreign('contact_id') -> references('id') -> on ('asi_contacts') ->  onDelete('cascade');

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
        Schema::drop('asi_emails');
    }
}
