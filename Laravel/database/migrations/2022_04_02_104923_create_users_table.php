<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->string('code', 15)->default('');
            $table->string('email',100);
            $table->tinyInteger('legitimacy')->default(0);
            $table->integer('group_id')->default(1);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->rememberToken();
            $table->foreign('group_id')->references('group_id')->on('student_group');
        });

        DB::table('users')->insert([
            'neptun'=>'AAA123',
            'password'=> Hash::make('admin'),
            'name'=>'Admin',
            'code'=>'',
            'email'=>'shelby.america.12@gmail.com',
            'group_id'=>2
        ]);
        DB::table('users')->insert([
            'neptun'=>'Y0DM28',
            'password'=> Hash::make('admin'),
            'name'=>'Admin',
            'code'=>'',
            'email'=>'shelby.america.12@gmail.com',
            'group_id'=>2
        ]);
        DB::table('users')->insert([
            'neptun'=>'BNTET0',
            'password'=> Hash::make('admin'),
            'name'=>'Admin',
            'code'=>'',
            'email'=>'shelby.america.12@gmail.com',
            'group_id'=>2
        ]);
        DB::table('users')->insert([
            'neptun'=>'WGXNP2',
            'password'=> Hash::make('admin'),
            'name'=>'Admin',
            'code'=>'',
            'email'=>'shelby.america.12@gmail.com',
            'group_id'=>2
        ]);
        DB::table('users')->insert([
            'neptun'=>'BWQ1BU',
            'password'=> Hash::make('admin'),
            'name'=>'Admin',
            'code'=>'',
            'email'=>'shelby.america.12@gmail.com',
            'group_id'=>2
        ]);
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
