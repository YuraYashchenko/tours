@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Ordered tours:</h1>
            <ul class="list-group">
                @foreach($orders as $orders)
                    <li class="card"></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection