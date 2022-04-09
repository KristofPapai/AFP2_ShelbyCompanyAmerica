<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __construct(){
        $this->neptun = '';
    }
    private string $neptun;

    public function register(){
        return view('register');
    }
    function checkregister(Request $request){
        $this->validate($request, [
            'name' => ['required'],
            'password' => ['required'],
            'password_again' => ['required'],
            'email' => ['required']
        ]);
        if ($request['password']!=$request['password_again'])
        {
            return back()->with('error', 'Passwords not matching');
        }
        $user = array(
            'neptun' => $this->generateNeptun(),
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name'),
            'email'=>$request->get('email')
        );
        $login = array(
            'neptun' => $user['neptun'],
            'password' => $request->get('password'),
            'name' => $request->get('name'),
            'email'=>$request->get('email')
        );
        $newUser = new User;
        $newUser->neptun = $user['neptun'];
        $newUser->password = $user['password'];
        $newUser->name = $user['name'];
        $newUser->legitimacy = 0;
        $newUser->email = $user['email'];
        $newUser->code = 0;
        $newUser->group_id = 1;
        $newUser->save();
        
        $this->send_neptun($login['neptun'],$login['email']);
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
    function send_neptun($neptun, $email){
        $send = array('neptun' => $neptun);
        Mail::send('send_neptun', $send, function($message) use ($email) {
            $message->to($email, 'Sehelby America')->subject
            ('Registráció');
            $message->from('shelby.america.12@gmail.com','Shelby America');
        });
    }
}
