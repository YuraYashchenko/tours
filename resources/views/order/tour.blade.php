@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-2">
            <form action="{{ route('order.tour') }}" method="GET">
                <div class="form-group">
                    <select name="services[]" class="form-control" multiple id="services">
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ in_array($service->id, old('services') ?? []) ? 'selected' : '' }}>{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary btn-block">Filter</button>
                </div>
                <div class="form-group">
                    <a href="{{ route('order.tour') }}" class="btn btn-danger btn-block">Reset</a>
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