<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationProceedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_proceedings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id');
            $table->string("proceeding_name");
            $table->string("conference_name");
            $table->text("conference_location");
            $table->text("conference_date");
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
        Schema::dropIfExists('publication_proceedings');
    }
}
