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

    function checklogin(Request $request)
    {
        $this->validate($request, [
            'neptun_kod'   => ['required'],
            'password'  => ['required','min:3']
        ]);
        $diak = array(
            'neptun_kod' => $request->get('neptun_kod'),
            'password' => $request->get('password'),
        );

        if(Auth::attempt($diak))
        {
            //dd(Auth::check());
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
