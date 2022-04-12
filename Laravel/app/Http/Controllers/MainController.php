<?php
namespace  App\Http\Controllers;
use App\Models\Timetable;

use App\Models\user;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


    function checkpassword (Request $request) {
        $user = user::findorFail($request['neptun']);
        $old_password = Hash::make($request['old_password']);
        if($old_password == $user->password){
            return back()->with('error', 'Password not matching');
        }
        user::where('neptun', $user->neptun)->update([
            'password'=> Hash::make($request['new_password']),
            'name'=>$request['name'],
            'code'=>0,
            'email'=>$user->email,
            'legitimacy'=>$user->legitimacy,
            'group_id'=>$user->group_id
        ]);
        return redirect('/main');
    }

    //TODO: insert into diák kurzus
    function checkcoursemultiple(Request $request) {
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
    function checkcoursesingle(Request $request) {
        $tTable = new Timetable();
        $tTable -> course_id = 'Vala';
        $tTable -> student_id = $request;
        $tTable -> save();
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
