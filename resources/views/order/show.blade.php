@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $tour->name }}</h3>
            </div>

            <div class="card-body">
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ $tour->image }}" width="320" height="250" class="mr-1">
                        </div>
                        <div class="col-md-7">
                            <h5>Description: {{ $tour->description }}</h5>
                            <h5>Price: {{ $tour->price }}</h5>
                            <h5>Region: {{ $tour->region }}</h5>
                            <h5>Stars: {{ $tour->stars }}</h5>
                            <h5>Services: {{ convertToString($tour->services) }} </h5>
                            <h5>Start date: {{  $tour->start_date }}</h5>
                            <h5>End date: {{ $tour->end_date }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mt-3">
            <a href="#" class="btn btn-block btn-success">Order</a>
        </div>
    </div>
</div>
@endsection