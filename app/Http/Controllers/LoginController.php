<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::attempt(['username' =>$request->get('username'), 'password' =>$request->get('password')]))
        {
            if(Auth()->user()->type == "admin")
                return redirect('dashboard');
            else
                return redirect('dashboard/session');
        }
        else {
            $errors = ['برجاء التاكد من اسم المستخدم او كلمه السر'];
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($errors);
        }

    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/');
        }

        return redirect()
            ->back();
    }

}