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
        Schema::create('student_group', function (Blueprint $table) {
            $table->integer('group_id')->primary();
            $table->string('group_name', 150);
            $table->timestamps();
        });
        DB::table('student_group')->insert([
            'group_id'=>'1',
            'group_name'=>'új felhasználó'
        ]);
        DB::table('student_group')->insert([
            'group_id'=>'2',
            'group_name'=>'Tanár'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_group');
    }
};
