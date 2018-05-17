<?php

namespace App\Http\Controllers;

use App\User;

class UserProfileController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user.profile', compact('user'));
    }
}
