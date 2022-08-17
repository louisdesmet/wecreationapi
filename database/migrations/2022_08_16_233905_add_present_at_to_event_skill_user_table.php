<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPresentAtToEventSkillUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_skill_user', function (Blueprint $table) {
            $table->dateTime('accepted_at')->nullable();
            $table->dateTime('present_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_skill_user', function (Blueprint $table) {
            $table->dropColumn('accepted_at');
            $table->dropColumn('present_at');
        });
    }
}
