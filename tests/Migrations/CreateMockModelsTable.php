<?php


namespace Hamidrezaniazi\Laramist\Tests\Migrations;


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMockModelsTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mock_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_field');
            $table->string('second_field');
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
        Schema::drop('mock_models');
    }
}
