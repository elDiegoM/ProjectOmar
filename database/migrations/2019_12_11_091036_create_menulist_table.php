<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenulistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menulist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::connection('pgsql2')->create('menulist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::connection('pgsql3')->create('menulist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menulist');
        Schema::connection('pgsql2')->dropIfExists('menulist');
        Schema::connection('pgsql3')->dropIfExists('menulist');
    }
}
