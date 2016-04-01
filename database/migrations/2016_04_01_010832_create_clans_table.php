<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
            $table->string('name');
            $table->string('type');
            $table->longText('description')->nullable();
            $table->string('location_id');
            $table->string('badge_small');
            $table->string('badge_medium');
            $table->string('badge_large');
            $table->string('warFrequency');
            $table->integer('clanLevel');
            $table->integer('warWins')->default(0);
            $table->integer('warWinStreak')->default(0);
            $table->integer('clanPoints')->default(0);
            $table->integer('requiredTrophies')->default(0);
            $table->integer('members');
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
        Schema::drop('clans');
    }
}
