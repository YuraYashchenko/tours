@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price per day, UAH:</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="region">Region:</label>
                    <input type="text" name="region" id="region" class="form-control">
                </div>

                <div class="form-group">
                    <label for="stars">Stars(1-5):</label>
                    <input type="text" name="stars" id="stars" class="form-control">
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
                    <label for="standard-food-price">Price for Standard food, UAH:</label>
                    <input class="form-control" type="text" name="standardFoodPrice">
                </div>

                <div class="form-group">
                    <label for="dietary-food-price">Price for Dietary food, UAH:</label>
                    <input class="form-control" type="text" name="dietaryFoodPrice">
                </div>

                <div class="form-group">
                    <label for="buffet-food-price">Price for Buffet food, UAH:</label>
                    <input class="form-control" type="text" name="buffetFoodPrice">
                </div>

                <div class="form-group">
                    <label for="economy-room-price">Price for Economy room, UAH:</label>
                    <input class="form-control" type="text" name="economyRoomPrice">
                </div>

                <div class="form-group">
                    <label for="standard-room-price">Price for Standard room, UAH:</label>
                    <input class="form-control" type="text" name="standardRoomPrice">
                </div>

                <div class="form-group">
                    <label for="lux-room-price">Price for Lux room, UAH:</label>
                    <input class="form-control" type="text" name="luxRoomPrice">
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input name="image" type="file" id="image" class="form-control">
                </div>

                <button class="btn btn-success btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection