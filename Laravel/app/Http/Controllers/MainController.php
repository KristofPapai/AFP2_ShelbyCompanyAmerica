<?php
namespace  App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePost;
use App\Models\Timetable;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function login(){
        return view('login');
    }
    public function main(){
        $user = user::find(Auth::id());
        return view('main', ['user' => $user]);
    }
    public function options(){
        $user = user::find(Auth::id());
        return view('options',['user' => $user]);
    }
    public function useroptions(){
        $user = user::find(Auth::id());
        return view('user_options', ['user' => $user]);
    }
    public function courseoptions(){
        $user = user::find(Auth::id());
        return view('course_options', ['user' => $user]);
    }
    public function listcourses(){
        $user = user::find(Auth::id());
        $records = Timetable::join('courses','courses.course_id', '=', 'timetables.course_id')->join('users', 'users.neptun', '=', 'timetables.student_id')->where('users.neptun', Auth::id())->get(['courses.*']);
        return view('list_course', ['records' => $records, 'user' => $user]);
    }
    public function addcourse(){
        $user = user::find(Auth::id());
        return view('add_course', ['user' => $user]);
    }

    function useroptionscheck(Request $request){
        $updateuser = user::find($request->neptun);
        if($updateuser == null){
            return back()->with('Error', 'There is no user with this neptun');
        }
        switch (true) {
            case $request->filled('name') && !$request->filled('new_password') && !$request->filled('new_auth'):
                $updateuser -> name = $request-> name;
                $updateuser->save();
                break;
            case $request->filled('name') && $request->filled('new_password') && !$request->filled('new_auth'):
                $updateuser -> name = $request-> name;
                $updateuser -> password = Hash::make($request -> new_password);
                $updateuser->save();
                break;
            case $request->filled('name') && $request->filled('new_auth') && !$request->filled('new_password'):
                $updateuser -> name = $request-> name;
                $updateuser -> legitimacy = $request-> new_auth;
                $updateuser->save();
                break;
            case $request->filled('name') && $request->filled('new_password') && $request->filled('new_auth'):
                $updateuser -> name = $request-> name;
                $updateuser -> password = Hash::make($request-> new_password);
                $updateuser -> legitimacy = $request-> new_auth;
                $updateuser->save();
                break;
            case $request->filled('new_password') && !$request->filled('name') && !$request->filled('new_auth'):
                $updateuser -> password = Hash::make($request-> new_password);
                $updateuser->save();
                break;
            case $request->filled('new_password') && $request->filled('new_auth') && !$request->filled('name'):
                $updateuser -> password = Hash::make($request-> new_password);
                $updateuser -> legitimacy = $request-> new_auth;
                $updateuser->save();
                break;
            case $request->filled('new_auth') && !$request->filled('new_password') && !$request->filled('name'):
                $updateuser -> legitimacy = $request-> new_auth;
                $updateuser->save();
                break;
            default:
                break;
        }
        return redirect('/main');

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

    function create_course_post($course_id, Request $request){
        $request->validate([
            'post_title'=>'required',
            'post_content'=>'required'
        ]);
        $coursepost = new CoursePost();
        $coursepost->course_id = $course_id;
        $coursepost->post_name = $request->post_title;
        $coursepost->post = $request->post_content;
        $coursepost->save();
        return redirect()->route('course', ['id'=>$course_id]);
    }

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
        $tTable -> course_id = 'AAAA';
        $tTable -> student_id = $request->get('neptun');
        $tTable -> save();
        return redirect('/courseoptions');
    }

    function course($course_id) {
        $course = Course::findOrFail($course_id);
        return view('course',['course_id'=>$course])->with($course_id);
    }
    function coursepost($post_id) {
        $course_post = CoursePost::findOrFail($post_id);
        return view('course_post',['post_id'=>$course_post])->with($post_id);
    }
    function coursepostcreate($course_id){
        return view('course_post_create', ['course_id' => $course_id])->with($course_id);
    }
    function coursepostdestroy($item){
        $course_post = CoursePost::findOrFail($item);
        $course_id = $course_post->course_id;
        $course_post->delete();
        return redirect()->route('course', ['id'=>$course_id]);
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
