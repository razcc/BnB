@extends('layouts.app')
@section('title', 'Create')


@section('content')
    <div class="container-fluid">
        <div class="row">

            {{-- MAP --}}
            <div class="col-6 d-flex justify-content-center">
                <h2 class="position-fixed">Map</h2>
            </div>

            {{-- Form col right --}}
            <form class="col-6" method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- NAME --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input required min="5" max="30" id="name" class="form-control " type="text" name="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea required min="10" max="500" name="description" class="form-control"></textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- IMMAGINE --}}
                <div class="mb-3">
                    <label class="custom-file-upload">
                        <input required name="cover_image" type="file" />
                        Upload Cover
                    </label>
                    @error('cover_image')
                        <div class=" alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ROOMS --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Rooms</label>
                    <input type="number" min="1" max="50" class="form-control" name="rooms">
                    @error('rooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BEDS --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Beds</label>
                    <input type="number" min="1" max="50" class="form-control" name="beds">
                    @error('beds')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BATHROOM --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Bathrooms</label>
                    <input type="number" min="1" max="50" class="form-control" name="bathrooms">
                    @error('bathrooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- MQ --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Mq</label>
                    <input type="number" min="1" max="1000" class="form-control" name="mq">
                    @error('mq')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ACCOMODATION --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Accomodation</label>
                    <input type="number" min="1" max="50" class="form-control" name="accomodation">
                    @error('accomodation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ADDRESS --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Address</label>
                    <input required type="text" class="form-control" name="address" id="address">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- AVAILABLE --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Availability</label>
                    <select name="available" class="form-control">
                        <option value=1>Available</option>
                        <option value=0>Not Available</option>
                    </select>
                </div>

                {{-- PRICE --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Price</label>
                    <input type="number" min="1" class="form-control" name="price">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- SERVICES --}}
                <div class="mb-3">
                    @foreach ($services as $service)
                        <input type="checkbox" class="btn-check" id="btn-check-outlined{{ $service->id }}"
                            name="services[]" value="{{ $service->id }}">
                        <label class="btn btn-outline-primary"
                            for="btn-check-outlined{{ $service->id }}">{{ $service->name }}</label>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>


    </div>
@endsection
