<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_semesters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('semester_id');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('semester_id')->references('id')->on('semesters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_semesters');
    }
}
