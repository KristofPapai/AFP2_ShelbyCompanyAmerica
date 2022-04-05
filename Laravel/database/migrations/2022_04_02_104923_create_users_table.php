<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('users', function (Blueprint $table) {
            $table->string('neptun',6)->primary();
            $table->string('password',150);
            $table->string('name',40);
            $table->string('code', 15);
            $table->string('email',100);
            $table->tinyInteger('legitimacy');
            $table->integer('group_id');
            $table->rememberToken();
            $table->foreign('group_id')->references('group_id')->on('student_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
