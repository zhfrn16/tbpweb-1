<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('semester_id');
            $table->string('name');
            $table->integer('min_students')->default(0);
            $table->integer('max_students')->default(1000);
            $table->boolean('cancelled')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
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
        Schema::dropIfExists('classrooms');
    }
}
