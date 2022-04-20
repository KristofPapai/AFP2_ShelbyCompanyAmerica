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
        Schema::create('courses', function (Blueprint $table) {
            $table->string('course_id',4)->primary();
            $table->string('course_name',20)->unique();
            $table->string('teacher_id',6);
            $table->timestamps();
            $table->foreign('teacher_id')->references('neptun')->on('users');
        });
        DB::table('courses')->insert([
            'course_id' => 'AAAA',
            'course_name' => 'Alap kurzus',
            'teacher_id' => 'AAA111'
        ]);
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
};
