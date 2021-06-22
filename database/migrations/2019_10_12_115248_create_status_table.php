<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('class');
        });

        Schema::connection('pgsql2')->create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('class');
        });

        Schema::connection('pgsql3')->create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('class');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
        Schema::connection('pgsql2')->dropIfExists('status');
        Schema::connection('pgsql3')->dropIfExists('status');
    }
}
