<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }
    function checkregister(Request $request){
        $this->validate($request, [
            'name' => ['required'],
            'password' => ['required'],
            'password_again' => ['required']
        ]);
        if ($request['password']!=$request['password_again'])
        {
            return back()->with('error', 'Passwords not matching');
        }
        $user = array(
            'neptun' => $this->generateNeptun(),
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name')
        );
        DB::insert('insert into users (neptun, password, name, legitimacy) values (?,?,?,0)', [$user['neptun'], $user['password'], $user['name']]);
        $login = array(
            'neptun' => $user['neptun'],
            'password' => $request->get('password'),
            'name' => $request->get('name')
        );
        if (Auth::attempt($login))
        {
            return redirect('/main');
        }
        else
        {
            return back()->with('error','Wrong Registration Details');
        }
    }
    function generateNeptun()
    {
        $string_array = str_split('QWERTZUIOPASDFGHJKLYXCVBNM');
        $neptun = '';
        for ($i = 0; $i < 6; $i++){
            $neptun .= $string_array[rand(0,count($string_array)-1)];
        }
        $neptun_array = str_split($neptun);
        $number = rand(0, 4);
        for ($i = 0; $i < $number; $i++){
            $neptun_array[rand(0,count($neptun_array)-1)] = rand(0,9);
        }
        $neptun = implode($neptun_array);
        return $neptun;
    }
}
