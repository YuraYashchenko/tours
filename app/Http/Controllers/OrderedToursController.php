<?php

namespace App\Http\Controllers;


use Auth;

class OrderedToursController extends Controller
{
    public function __invoke()
    {
        $tours = Auth::user()->tours;

        return view('user.tours', compact('tours'));
    }
}
