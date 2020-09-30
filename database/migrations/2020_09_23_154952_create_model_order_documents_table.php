<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelOrderDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_order_documents', function (Blueprint $table) {
            $table->increments('id_document');
            $table->string('document');
            $table->string('details')->nullable();
            $table->string('type_order');
            $table->double('price',10,2);
            $table->string('client');
            $table->string('code_client');
            $table->string('state')->default('OFF');
            $table->date('order_date');
            $table->string('order_year');
            $table->string('order_month');
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
        Schema::dropIfExists('model_order_documents');
    }
}
