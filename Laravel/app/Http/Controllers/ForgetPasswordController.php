<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{

    public function __construct(){
        $this->userCode =$this->generatecode();
    }
    public function check_code(){
        return view('check_code');
    }
    public function forget_password(){
        return view('forget_password');
    }
    public function sendemail(){
        return view('send_to_email');
    }

    private string $userCode;
    public function GetUserCode() {
        $this->userCode;
    }

    //TODO: Email küldés
    function send_email(Request $request){
        $code = array(
            'code'=>$this->GetUserCode(),
            'email'=>$request['email']);
        Mail::raw("something", function ($message) use ($code){
            $message -> from($code['email'], 'Laravel');
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
        if ($request['code'] != $this->GetUserCode()){
            dd($this->userCode);
            return  back()->with('error', 'Not matching code');
        }
        return redirect('/forget_password');
    }

    function change_password(Request $request)
    {
        $this->validate($request, [
            'neptun' => ['required'],
            'password' => ['required', 'min:3'],
            'password_again' => ['required', 'min:3']
        ]);
        if ($request['password'] != $request['password_again']) {
            return back()->with('error', 'Passwords not matching');
        }
        $user = array(
            'neptun' => $request->get('neptun'),
            'password' => Hash::make($request->get('password'))
        );
        DB::update('update users set password = ? where neptun = ?', [$user['password'], $user['neptun']]);
        return redirect('/login');
    }
}
