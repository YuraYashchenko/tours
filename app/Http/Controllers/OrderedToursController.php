<?php

namespace App\Http\Controllers;


use Auth;

class OrderedToursController extends Controller
{
    public function __invoke()
    {
        $orders = Auth::user()->orders->load('tour');

        return view('user.tours', compact('orders'));
    }
}
