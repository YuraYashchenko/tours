@extends ('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('tours.create') }}" class="btn btn-block btn-success">Create A Trip</a>
        </div>
    </div>

    @foreach($tours as $tour)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $tour->name }}</h3>
                    </div>

                    <div class="panel-body">
                        <h2>Description: {{ $tour->description }}</h2>
                        <h2>Price: {{ $tour->price }}</h2>
                        <h2>Region: {{ $tour->region }}</h2>
                        <h2>Stars: {{ $tour->stars }}</h2>
                        <h2>Start date: {{  $tour->start_date }}</h2>
                        <h2>End date: {{ $tour->end_date }}</h2>
                    </div>
                </div>
                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary btn-block">View</a>
            </div>
        </div>
    @endforeach
@endsection