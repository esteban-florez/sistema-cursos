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
            $table->string('image')->nullable();
            $table->foreignId('instructor_id')->constrained();
            $table->foreignId('area_id')->constrained();
            $table->string('description');
            $table->string('total_price');
            $table->string('price_ins');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('start_course');
            $table->date('end_course');
            $table->string('duration');
            $table->string('student_limit');
            $table->time('start_time');
            $table->time('end_time');
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
