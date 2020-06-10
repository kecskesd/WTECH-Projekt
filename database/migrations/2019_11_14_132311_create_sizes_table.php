<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('30')->unsigned()->nullable();
            $table->smallInteger('31')->unsigned()->nullable();
            $table->smallInteger('32')->unsigned()->nullable();
            $table->smallInteger('33')->unsigned()->nullable();
            $table->smallInteger('34')->unsigned()->nullable();
            $table->smallInteger('35')->unsigned()->nullable();
            $table->smallInteger('36')->unsigned()->nullable();
            $table->smallInteger('37')->unsigned()->nullable();
            $table->smallInteger('38')->unsigned()->nullable();
            $table->smallInteger('39')->unsigned()->nullable();
            $table->smallInteger('40')->unsigned()->nullable();
            $table->smallInteger('41')->unsigned()->nullable();
            $table->smallInteger('42')->unsigned()->nullable();
            $table->smallInteger('43')->unsigned()->nullable();
            $table->smallInteger('44')->unsigned()->nullable();
            $table->smallInteger('45')->unsigned()->nullable();
            $table->smallInteger('46')->unsigned()->nullable();
            $table->smallInteger('47')->unsigned()->nullable();
            $table->smallInteger('48')->unsigned()->nullable();
            $table->smallInteger('49')->unsigned()->nullable();
            $table->smallInteger('50')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}
