<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id');
            $table->string('journal_name');
            $table->integer('volume');
            $table->integer('no');
            $table->timestamps();

            $table->foreign('publication_id')->references('id')->on('publications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication_journals');
    }
}
