<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsiUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asi_users', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('username');
            $table -> string('password', 60);
            $table -> string('email') -> unique();

            // id role
            $table -> integer('role_id') -> unsigned();
            $table -> foreign('role_id') -> references('id') -> on ('asi_user_roles') -> onDelete('cascade');

            $table -> rememberToken();
            $table -> boolean('active')->default(true);
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
        Schema::drop('asi_users');
    }
}
