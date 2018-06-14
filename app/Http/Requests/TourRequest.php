<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'region' => 'required|max:255',
            'stars' => 'required|digits_between:1,5',
            'services' => 'required',
            'image' => 'sometimes|image',
            'standardFoodPrice' => 'required|numeric',
            'dietaryFoodPrice' => 'required|numeric',
            'buffetFoodPrice' =>  'required|numeric',
            'standardRoomPrice' => 'required|numeric',
            'luxRoomPrice' => 'required|numeric',
            'economyRoomPrice' => 'required|numeric'
        ];
    }

    /**
     * @return array
     */
    public function transformPrices() : array
    {
        $nameTransformer = [
            'standardFoodPrice' => 'Standard',
            'dietaryFoodPrice' => 'Dietary',
            'buffetFoodPrice' => 'Buffet',
            'standardRoomPrice' => 'Standard',
            'luxRoomPrice' => 'Lux',
            'economyRoomPrice' => 'Economy'
        ];

        return [
            'food_prices' => transformPricesArray($this->only(['standardFoodPrice', 'dietaryFoodPrice', 'buffetFoodPrice']), $nameTransformer),
            'room_prices' => transformPricesArray($this->only(['standardRoomPrice', 'luxRoomPrice', 'economyRoomPrice']), $nameTransformer)
        ];
    }
}
