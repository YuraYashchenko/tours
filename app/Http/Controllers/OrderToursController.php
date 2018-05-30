<?php

namespace App\Http\Controllers;

use App\Service;
use App\Tour;
use App\TourFilters;
use Illuminate\Http\Request;

class OrderToursController extends Controller
{
    /**
     * Get all tours for user.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     * @internal param TourFilters $filters
     */
    public function index(Request $request)
    {
        $services = Service::all();

        $filters = array_filter($request->input('services') ?? [], function ($filter) use ($services) {
            return in_array($filter, $services->pluck('id')->toArray());
        });

        $tours = Tour::with('services')->filterByServices($filters)->paginate(2);

        $request->flash();

        return view('order.tour', compact('tours', 'services'));
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
