<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->integer('total_price');
            $table->integer('price_ins');
            $table->date('start_ins');
            $table->date('end_ins');
            $table->date('start_course');
            $table->date('end_course');
            $table->integer('duration');
            $table->integer('student_limit');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('instructor_id')->constrained();
            $table->foreignId('area_id')->constrained();
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
        Schema::dropIfExists('courses');
    }
}
