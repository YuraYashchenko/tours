<?php


namespace App;


use Carbon\Carbon;
use Illuminate\Http\Request;

class PriceCalculation
{
    public static function calculate(Tour $tour, Request $request) : int
    {
        $duration = Carbon::parse($request->end_date)->diffInDays($request->start_date);

        return $duration * $request->number * ($tour->price + $tour->food_prices[$request->foodType]['price'] + $tour->room_prices[$request->roomType]['price']);
    }
}