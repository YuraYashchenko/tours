<?php

namespace App\Http\Controllers;

use App\User;

class UserProfileController extends Controller
{
    /**
     * Show user profile.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(User $user)
    {
        return view('user.profile', compact('user'));
    }
}
