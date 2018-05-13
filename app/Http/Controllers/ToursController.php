<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
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
        return view('tours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourRequest $request)
    {
        Tour::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        return view('tours.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        return view('tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TourRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(TourRequest $request, Tour $tour)
    {
        $tour->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();

        return redirect()->back();
    }
}
