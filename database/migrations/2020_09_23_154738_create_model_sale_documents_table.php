<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSaleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_sale_documents', function (Blueprint $table) {
            $table->increments('id_sale');
            $table->string('client');
            $table->string('client_code')->nullable();
            $table->string('document');
            $table->string('details')->nullable();
            $table->double('price',10,2);
            $table->string('ticket')->nullable();
            $table->date('ticket_date')->nullable();
            $table->string('payment_method');
            $table->string('bank')->nullable();
            $table->year('academic_year');
            $table->string('state');
            $table->date('date_payment');
            $table->string('month_payment');
            $table->string('day_payment');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id_student')->on('model_students');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('order_code');
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
        Schema::dropIfExists('model_sale_documents');
    }
}
