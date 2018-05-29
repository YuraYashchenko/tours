@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Ordered tours:</h1>
            <ul class="list-group">
                @forelse($orders as $order)
                    <div class="card">
                        <h5 class="card-header">{{ $order->tour->name }}</h5>
                        <div class="card-body">
                            <h5 class="card-title  ">Start date: {{ $order->start_date }}</h5>
                            <h5 class="card-title">End date: {{ $order->end_date }}</h5>
                            <h5 class="card-title">Number of people: {{ $order->number }}</h5>
                            <h5 class="card-title">Price: {{ $order->price }}</h5>

                            <a href="{{ route('order.tour.show', $order->tour->id) }}" class="btn btn-primary btn-block">Details</a>
                        </div>
                    </div>
                @empty
                    <p>You have not ordered any tour yet.</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection