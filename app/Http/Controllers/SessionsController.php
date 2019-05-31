<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ], [
            'email.required' => 'username can not be null',
            'email.email' => 'username only can be email',
            'email.max' => 'username max length is 255',
            'password.reqired' => 'password can not be null'
        ]);
        if (Auth::attempt($data)) {
            session()->flash('success', 'welcome back ' . Auth::user()->name);
            return redirect()->route('users.show', Auth::user());
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
