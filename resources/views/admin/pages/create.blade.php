@extends('layouts.app')
@section('title', 'Create')


@section('content')
    <div class="container-fluid">

        <form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">

            @csrf


            <div class="fs-1 mb-5 mt-1">New apartment</div>



            {{-- NAME --}}
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control ">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            {{-- DESCRIPTION --}}
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            {{-- IMMAGINE --}}
            <input type="file" name="cover_image" id="file-input" />
            <label class="file-input__label " for="file-input">

                <span class="p-1">Upload apartment image</span></label>
            @error('cover_image')
                <div class=" alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- ROOMS --}}
            <label class="form-label form-check-label" for="">Rooms</label>
            <input type="number" min="1" max="50" class="form-control" name="rooms">
            @error('rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- BEDS --}}
            <label class="form-label form-check-label" for="">Beds</label>
            <input type="number" min="1" max="50" class="form-control" name="beds">
            @error('beds')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- BATHROOM --}}
            <label class="form-label form-check-label" for="">Bathrooms</label>
            <input type="number" min="1" max="50" class="form-control" name="bathrooms">
            @error('bathrooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- MQ --}}
            <label class="form-label form-check-label" for="">Mq</label>
            <input type="number" min="1" max="1000" class="form-control" name="mq">
            @error('mq')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            {{-- ACCOMODATION --}}
            <label class="form-label form-check-label" for="">Accomodation</label>
            <input type="number" min="1" max="50" class="form-control" name="accomodation">
            @error('accomodation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            {{-- ADDRESS --}}
            <label class="form-label form-check-label" for="">Address</label>
            <input type="text" class="form-control" name="address" id="address">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            {{-- AVAILABLE --}}
            <label class="form-label form-check-label" for="">Availability</label>
            <select name="available" class="form-control">
                <option value=1>Available</option>
                <option value=0>Not Available</option>
            </select>

            {{-- PRICE --}}
            <label class="form-label form-check-label" for="">Price</label>
            <input type="number" min="1" class="form-control" name="price">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            {{-- SERVICES --}}
            @foreach ($services as $service)
                <div class="cat action btn btn-dark border-0 rounded-5 p-1 mr-1 mb-2 ">
                    <label class="">
                        <input type="checkbox" name="services[]"
                            value="{{ $service->id }}"><span>{{ $service->name }}</span>
                    </label>
                </div>
            @endforeach

            <button type="submit" class=" btn-custom ">Add apartment</button>

        </form>
    </div>
@endsection
