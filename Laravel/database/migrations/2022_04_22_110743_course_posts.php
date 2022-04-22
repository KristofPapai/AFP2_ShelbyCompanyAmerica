<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('course_id',4);
            $table->string('post_name',100);
            $table->string('post',10000);
            $table->timestamps();
            $table->foreign('course_id')->references('course_id')->on('courses');
        });
        DB::table('course_posts')->insert([
            'post_id' => '1',
            'course_id' => 'AAAA',
            'post_name'=> 'AAAAAAA',
            'post' => 'AAAAAAAAAAAAAAAAAAAAAAAAAA'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_posts');
    }
};
