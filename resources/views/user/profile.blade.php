@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Name: {{ $user->name }}</h3>
            <h3>E-mail: {{ $user->email }}</h3>
        </div>
    </div>
@endsection