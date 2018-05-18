<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use App\Service;
use App\Tour;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();

        return view('tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('tours.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TourRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourRequest $request)
    {
        $tour = Tour::create(array_merge(
            $request->except('services'),
            ['image' => $request->file('image')->store('images', 'public')]
        ));

        $tour->services()->sync($request->services);

        return redirect()->route('tours.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        $tour->load('services');

        return view('tours.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        $services = Service::all();

        return view('tours.edit', compact('tour', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TourRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(TourRequest $request, Tour $tour)
    {
        $tour->update(array_merge(
            $request->except('services'),
            ['image' => $request->file('image')->store('images', 'public')]
        ));

        $tour->services()->sync($request->services);

        return redirect()->route('tours.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();

        return redirect()->route('tours.index');
    }
}
