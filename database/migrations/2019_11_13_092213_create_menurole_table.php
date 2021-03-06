<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuroleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_name');
            $table->integer('menus_id')->unsigned();
        });

        Schema::connection('pgsql2')->create('menu_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_name');
            $table->integer('menus_id')->unsigned();
        });

        Schema::connection('pgsql3')->create('menu_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_name');
            $table->integer('menus_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_role');
        Schema::connection('pgsql2')->dropIfExists('menu_role');
        Schema::connection('pgsql3')->dropIfExists('menu_role');
    }
}
