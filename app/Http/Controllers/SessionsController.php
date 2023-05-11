<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.new');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            if (Auth::user()->is_admin) {
                return redirect()->intended('items');
            }
    
            return redirect()->intended('orders');
        }
    
        return back()->withErrors([
            'email' => '認証に失敗しました。',
        ]);
    }

    // SessionsController.php
    public function destroy()
    {
        auth()->logout();
        return redirect('/sessions/new')->with('success', 'ログアウトしました');
    }
}
