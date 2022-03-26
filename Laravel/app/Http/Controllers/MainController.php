<?php
namespace  App\Http\Controllers;
use Illuminate\Http\Request;
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
            return redirect('/main');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
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
