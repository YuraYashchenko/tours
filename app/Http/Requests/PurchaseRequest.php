<?php

namespace App\Http\Requests;

use App\Order;
use App\PriceCalculation;
use App\Tour;
use DB;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Stripe\{Customer, Charge};


class PurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tourId' => 'required',
            'stripeEmail' => 'required',
            'stripeToken' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'number' => 'required|integer',
            'roomType' => 'required',
            'foodType' => 'required'
        ];
    }

    public function purchase()
    {
        $tour = Tour::findOrFail($this->tourId);
        $price = PriceCalculation::calculate($tour, $this);

        $customer = Customer::create([
            'email' => $this->stripeEmail,
            'source' => $this->stripeToken
        ]);

        Charge::create([
            'customer' => $customer->id,
            'amount' => $price,
            'currency' => 'uah'
        ]);

        Order::create([
            'tour_id' => $this->tourId,
            'user_id' => Auth::user()->id,
            'number' => $this->number,
            'price' => $price,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'food_type' => $tour->food_prices[$this->foodType]['name'],
            'room_type' => $tour->room_prices[$this->roomType]['name'],
        ]);
    }
}
