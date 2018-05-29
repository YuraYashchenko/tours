@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-2">
            <form action="{{ route('sort.tours') }}" method="POST">
                @csrf
                <div class="form-check d-flex flex-column">
                    @foreach($services as $service)
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="{{ $service->id }}" value="1" {{ request()->old($service->id) == 1 ? 'checked' : ''}}>
                            {{ $service->name }}
                        </label>
                    @endforeach
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary btn-block">Filter</button>
                </div>
                <div class="form-group mt-1">
                    <a href="{{ route('order.tour') }}" class="btn btn-primary btn-block">Reset</a>
                </div>
            </form>
        </div>
        <div class="col-md-8 col-md-offset-2">
            @foreach($tours as $tour)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $tour->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <h5>Services: {{ convertToString($tour->services) }}</h5>
                        </div>
                        <div class="card-text">
                            <h5>{{ $tour->description }}</h5>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <a href="{{ route('order.tour.show', $tour->id) }}" class="btn btn-primary btn-block">Show</a>
                </div>
            @endforeach

            <div class="row justify-content-center">
                {{ $tours->links() }}
            </div>
        </div>
    </div>

@endsection