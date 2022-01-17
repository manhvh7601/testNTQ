<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $data = ([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        $result = Auth::attempt($data);

        if($result){
            dd($result);
            session()->flash('success', 'Login Complete');
            return redirect()->route('showStudent'); 
        }else{
            session()->flash('error', 'Sai email hoac password');
            return back();
        }

    }
    public function getLogout()
    {
        Auth::logout();
        return view('welcome');
    }
}
