<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
            $table->string('name');
            $table->string('role');
            $table->integer('expLevel');
            $table->integer('league_id');
            $table->integer('trophies');
            $table->integer('clanRank');
            $table->integer('previousClanRank')->default(0);
            $table->integer('donations');
            $table->integer('donationsReceived');
            $table->string('clanTag');
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
        Schema::drop('members');
    }
}
