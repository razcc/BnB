@extends('layouts.app')
@section('title', 'Create')


@section('content')
    <div class="container-fluid pt-5">
        <div class="row d-flex flex-row-reverse">


            {{-- Form col right --}}
            <form class="col-6" method="POST" action="{{ route('admin.apartments.store') }}"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-center">Create Your New Apartment</h1>

                {{-- NAME --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input required min="5" max="30" id="name" class="form-control " type="text"
                        name="name">
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

                {{-- ADDRESS --}}
                <div id="search_cont" class="mb-3 map_custom_style">
                    <div id="map" class="map  " style="width: 500px; height: 500px;"></div>

                    <input required min="1" max="50" type="hidden" id="address" name="address"
                        type="text">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="hidden" id="lat" name="lat" type="text">
                    <input type="hidden" id="long" name="long" type="text">
                </div>
                {{-- Invio --}}
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
    <!-- TomTOM JS -->
    <script src="{{ asset('js/create.js') }}" defer></script>
@endsection
