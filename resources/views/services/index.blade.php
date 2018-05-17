@extends('layouts.app')

@section('content')
     <services :data="{{ $services }}"></services>
@endsection