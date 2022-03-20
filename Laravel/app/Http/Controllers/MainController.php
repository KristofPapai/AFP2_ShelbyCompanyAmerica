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
            'password' => $request->get('password'),
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
