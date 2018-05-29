@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" value="{{ $tour->name }}" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $tour->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price per day, UAH:</label>
                    <input type="text" value="{{ $tour->price / 100 }}" name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="region">Region:</label>
                    <input type="text" value="{{ $tour->region }}" name="region" id="region" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stars">Stars(1-5):</label>
                    <input type="text" value="{{ $tour->stars }}" name="stars" id="stars" class="form-control">
                </div>

                <div class="form-group">
                    <label for="service">Chose a Services:</label>
                    <select multiple name="services[]" id="service" class="custom-select">
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input name="image" type="file" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection