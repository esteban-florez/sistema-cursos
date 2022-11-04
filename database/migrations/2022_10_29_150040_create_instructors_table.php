<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->integer('ci')->unique();
            $table->enum('ci_type', ['V', 'E'])->default('V');
            $table->string('image');
            $table->enum('gender', ['M', 'F']);
            $table->string('phone');
            $table->string('direction');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('degree');
            $table->date('birth');
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
        Schema::dropIfExists('instructors');
    }
}
