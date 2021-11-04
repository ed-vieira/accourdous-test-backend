<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // e-mail do proprietário, rua, número, complemento, bairro, cidade, estado
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 200);
            $table->string('description', 400)->nullable();
            $table->string('email', 100);
            $table->boolean('email_verified')->default(false);
            $table->string('state', 40);
            $table->string('city', 40);
            $table->string('district', 40);
            $table->string('street', 120);
            $table->string('number', 10);
            $table->string('complement', 300);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
