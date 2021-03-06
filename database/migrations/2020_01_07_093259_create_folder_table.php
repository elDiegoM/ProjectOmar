<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('folder_id')->unsigned()->nullable();
            $table->boolean('resource')->nullable();
        });

        Schema::connection('pgsql2')->create('folder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('folder_id')->unsigned()->nullable();
            $table->boolean('resource')->nullable();
        });

        Schema::connection('pgsql3')->create('folder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('folder_id')->unsigned()->nullable();
            $table->boolean('resource')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folder');
        Schema::connection('pgsql2')->dropIfExists('folder');
        Schema::connection('pgsql3')->dropIfExists('folder');
    }
}
