<?php
namespace  App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;
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
    public function sendemail(){
        return view('send_to_email');
    }
    public function forget_password(){
        return view('forget_password');
    }
    public function check_code(){
        return view('check_code');
    }
    public function register(){
        return view('register');
    }
    function useroptionscheck(Request $request){
        //TODO: Adatbázisban megváltoztatni az értékeket
        switch (true) {
            case $request->filled('new_password'):
                dd('valami');
                break;
            case $request->filled('new_auth'):
                dd('valami2');
                break;
            case $request->filled('new_password') && $request->filled('new_auth'):
                dd('valami3');
                break;
            default:
                break;
        }

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
    //TODO: Email küldés javítása
    function send_email(Request $request){
        $code = array(
            'code'=>$this->generatecode(),
            'email'=>$request['email']);
        Mail::raw($code, function ($message) use ($code){
           $message -> to($code['email']) -> subject('Forget Password');
        });
        redirect('check_code');
    }
    function generatecode()
    {
        $code = '';
        $string = str_split('QWERTZUIOPASDFGHJKLYXCVBNM');
        for ($i = 0; $i < 10; $i++) {
            $code .= $string[rand(0, count($string) - 1)];
        }
        return $code;
    }
    function checkcode(Request $request){
        $this->validate($request, [
            'code'=>['required']
        ]);
        //TODO: Az elküldött kód vizsgálata
        if ($request['code'] != "code"){
            return  back()->with('error', 'Not matching code');
        }
        return redirect('/forget_password');
    }
    function change_password(Request $request){
        $this->validate($request, [
            'neptun'   => ['required'],
            'password'  => ['required','min:3'],
            'password_again' => ['required', 'min:3']
        ]);
        if ($request['password'] != $request['password_again']){
            return back() -> with('error', 'Passwords not matching');
        }
        $user = array(
            'neptun'=>$request->get('neptun'),
            'password'=>Hash::make($request->get('password'))
        );
        DB::update('update users set password = ? where neptun = ?',[$user['password'],$user['neptun']]);
        return redirect('/login');
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
