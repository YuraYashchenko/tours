@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('tours.update', $tour->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" value="{{ $tour->name }}" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" value="{{ $tour->description }}" name="description" id="description" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" value="{{ $tour->price }}" name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="region">Region:</label>
                    <input type="text" value="{{ $tour->region }}" name="region" id="region" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stars">Stars(1-5):</label>
                    <input type="text" value="{{ $tour->stars }}" name="stars" id="stars" class="form-control">
                </div>

                <div class="form-group">
                    <label for="start-date">Start day of trip:</label>
                    <input type="date" value="{{ $tour->start_date }}" name="start_date" id="start-date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="end-date">End day of trip:</label>
                    <input type="date" value="{{ $tour->end_date }}" name="end_date" id="endd-date" class="form-control">
                </div>

                <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection