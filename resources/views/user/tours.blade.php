@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Ordered tours:</h1>
            <ul class="list-group">
                @foreach($tours as $tour)
                    <li class="list-group-item"><a href="{{ route('order.tour.show', $tour->id) }}">{{ $tour->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection