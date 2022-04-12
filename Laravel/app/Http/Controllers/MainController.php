<?php
namespace  App\Http\Controllers;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Vtiful\Kernel\Excel;

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
    function checkcoursesingle(Request $request) {
        $uploadedFile = $request->file('courseMultNeptun');
        $data = array_map('str_getcsv', file($uploadedFile));
        for ($i = 0; $i<count($data); $i++){
            $tTable = new Timetable();
            $tTable -> course_id = 'Vala';
            $tTable -> student_id = $data[$i][0];
            $tTable -> save();
        }
        dd($i);
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
