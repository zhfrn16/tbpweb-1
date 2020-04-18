<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_audiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('intenship_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();

            $table->foreign('internship_id')->references('id')->on('internships');
            $table->foreign('student_id')->references('id')->on('students');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship_audiences');
    }
}
