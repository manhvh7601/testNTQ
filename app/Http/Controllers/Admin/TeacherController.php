<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function getLoginForm() {
        return view('login');
    }
    public function loginForm(Request $request){
        $data = $request->only([
            'email', 'password'
        ]);
        $result = Auth::attempt($data);

        if($result == false){
            session()->flash('error', 'Sai email hoac password');
            return back();
        }else{
            Auth::attempt($data);
        }
        dd($result);
        return redirect()->route('showStudent');
    }
    public function logout(Request $request){
        Auth::logout();
        return view('welcome');
    }
}
