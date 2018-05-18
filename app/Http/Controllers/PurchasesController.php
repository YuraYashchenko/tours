<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use Stripe\{Customer, Charge};

class PurchasesController extends Controller
{
    public function store(Request $request)
    {
        $tour = Tour::find($request->id);

        $customer = Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken
        ]);

        Charge::create([
            'customer' => $customer->id,
            'amount' => $tour->price,
            'currency' => 'uah'
        ]);

        return 'All done';
    }
}
