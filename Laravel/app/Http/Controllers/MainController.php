<?php
namespace  App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class MainController extends Controller
{
    public function login(){
        return view('login');
    }
    public function main(){
        return view('main');
    }
    public function options(){
        return view('options');
    }
    public function useroptions(){
        return view('user_options');
    }
    public function courseoptions(){
        return view('course_options');
    }
    public function register(){
        return view('register');
    }
    function useroptionscheck(Request $request){
        //TODO: Adatbázisban megváltoztatni az értékeket
        if($request->filled('new_password' )&&$request->filled('new_auth')) {

        }
        else if($request->filled('new_auth')){

        }
        else if($request->filled('new_password')){

        }
        return view('user_options');

    }
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'neptun'   => ['required'],
            'password'  => ['required','min:3']
        ]);
        $user = array(
            'neptun' => $request->get('neptun'),
            'password' => $request->get('password')
        );
        if(Auth::attempt($user))
        {
            //dd(Auth::check());
            return redirect('/main');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

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
    //TODO: Az adatbázison végigmegy a neptun kódokért majd ha a jelszavaknál egyezést talál megváltoztatja az újra
    function checkpassword (Request $request) {

    }
    //TODO: insert into diák kurzus
    function checkcourse(Request $request) {

    }
    function successlogin()
    {
        return view('main');
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

}
