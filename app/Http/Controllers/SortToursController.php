<?php

namespace App\Http\Controllers;

use App\Service;
use App\Tour;
use Illuminate\Http\Request;

class SortToursController extends Controller
{
    /**
     * Get sorted tours.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $services =  Service::find(array_keys($request->except('_token')))->pluck('name');

        $tours = Tour::whereHas('services', function ($query) use ($services) {
            $query->whereIn('name', $services);
        })->paginate(5);

        return view('order.tour', [
            'tours' => $tours,
            'services' => Service::all()
        ]);
    }
}
