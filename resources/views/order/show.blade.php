@extends('layouts.app')

@section('content')
    <order-tour :stripe-key="{{ json_encode(config('services.stripe.key')) }}" :tour="{{ $tour }}"></order-tour>
@endsection