<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Uitvoerende kunst', 'Audiovisueel', 'Sociaal', 'Cultureel', 'Wetenschappelijk', 'Zorg', 'Overige']);
            $table->text('description');
            $table->integer('credits');
            $table->unsignedBigInteger('leader_id');
            $table->foreign('leader_id')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
}
