<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescUserToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('time')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('image');
            $table->dropColumn('description');
            $table->dropColumn('time');
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
        });
    }
}
