<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_phones', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('phone');
            // id contacto
            $table -> integer('address_id') -> unsigned() -> nullable();
            $table -> foreign('address_id') -> references('id') -> on('asi_addresses') -> onDelete('cascade');

            $table -> integer('contact_id') -> unsigned() -> nullable();
            $table -> foreign('contact_id') -> references('id') -> on('asi_contacts') -> onDelete('cascade');

            $table -> string('type_phone');
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
        Schema::drop('asi_phones');
    }
}
