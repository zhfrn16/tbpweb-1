<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id');
            $table->foreignId('user_id');
            $table->integer('position');
            $table->timestamps();

            $table->foreign('publication_id')->references('id')->on('publications');
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
        Schema::dropIfExists('publication_members');
    }
}
