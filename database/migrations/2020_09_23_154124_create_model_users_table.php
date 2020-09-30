<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username');
            $table->string('email',60)->nullable()->unique();
            $table->string('type_user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('people_id')->unsigned();
            $table->foreign('people_id')->references('id_people')->on('model_people')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id_contact')->on('model_contacts');
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
        Schema::dropIfExists('model_users');
    }
}
