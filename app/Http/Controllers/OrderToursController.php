<?php

namespace App\Http\Controllers;

use App\Tour;

class OrderToursController extends Controller
{
    /**
     * Get all tours for user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tours = Tour::with('services')->paginate(5);

        return view('order.tour', compact('tours'));
    }

    /**
     * Show the information about the tour.
     *
     * @param Tour $tour
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Tour $tour)
    {
        $tour->load('services');

        return view('order.show', compact('tour'));
    }
}