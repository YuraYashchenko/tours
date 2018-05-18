@extends('layouts.app')

@section('content')
    <order-tour :tour="{{ $tour }}"></order-tour>
@endsection