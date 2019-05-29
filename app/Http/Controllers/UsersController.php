<?php
namespace App\Http\Controllers;


use App\Model\User;

class UsersController
{
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}