@extends ('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($tours as $tour)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $tour->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <h5>{{ $tour->description }}</h5>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary btn-block">View</a>
                </div>
            @endforeach

            <div class="row justify-content-center">
                {{  $tours->links() }}
            </div>
        </div>
    </div>
@endsection