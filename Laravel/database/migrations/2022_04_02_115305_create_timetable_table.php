<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('course_id',4);
            $table->string('student_id',6);
            $table->timestamps();
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('student_id')->references('neptun')->on('users');
        });
        DB::table('timetables')->insert([
            'course_id' => 'AAAA',
            'student_id' => 'AAA112'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
};
