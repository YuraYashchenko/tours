@extends ('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('tours.create') }}" class="btn btn-block btn-success">Create A Trip</a>
        </div>
    </div>
@endsection