@extends('layouts.app')
@section('title', 'Create')


@section('content')
    <div class="container-fluid pt-5">
        <div class="row d-flex flex-row-reverse">


            {{-- Form col right --}}
            <form class="col-6" method="POST" action="{{ route('admin.apartments.update', $apartment['id']) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h1 class="text-center">Edit Your Apartment</h1>
                {{-- NAME --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $apartment->name }}" required min="5" max="30" id="name"
                        class="form-control " type="text" name="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" value="{{ $apartment->description }}" required min="10" max="500"
                        name="description" class="form-control"></input>
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
                    <input value="{{ $apartment->rooms }}" type="number" min="1" max="50" class="form-control"
                        name="rooms">
                    @error('rooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BEDS --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Beds</label>
                    <input value="{{ $apartment->beds }}" type="number" min="1" max="50" class="form-control"
                        name="beds">
                    @error('beds')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BATHROOM --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Bathrooms</label>
                    <input value="{{ $apartment->bathrooms }}" type="number" min="1" max="50"
                        class="form-control" name="bathrooms">
                    @error('bathrooms')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- MQ --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Mq</label>
                    <input value="{{ $apartment->mq }}" type="number" min="1" max="1000" class="form-control"
                        name="mq">
                    @error('mq')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ACCOMODATION --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Accomodation</label>
                    <input value="{{ $apartment->accomodation }}" type="number" min="1" max="50"
                        class="form-control" name="accomodation">
                    @error('accomodation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- AVAILABLE --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Availability</label>
                    <select selected="selected" value="{{ $apartment->available }}" name="available" class="form-control">
                        <option {{ $apartment->available == 1 ? 'selected' : '' }} value=1>Available</option>
                        <option {{ $apartment->available == 0 ? 'selected' : '' }} value=0>Not Available</option>
                    </select>
                </div>

                {{-- PRICE --}}
                <div class="mb-3">
                    <label class="form-label form-check-label" for="">Price</label>
                    <input value="{{ $apartment->price }}" type="number" min="1" class="form-control"
                        name="price">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- SERVICES --}}
                <div class="mb-3">
                    @foreach ($services as $service)
                        <input type="checkbox" class="btn-check" id="btn-check-outlined{{ $service->id }}"
                            name="services[]" value="{{ $service->id }}"
                            {{ $apartment->services->contains($service) ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary"
                            for="btn-check-outlined{{ $service->id }}">{{ $service->name }}</label>
                    @endforeach
                </div>

                {{-- ADDRESS --}}
                <div id="search_cont" class="mb-3 map_custom_style">
                    <div id="map" class="map  " style="width: 500px; height: 500px;"></div>

                    <input value="{{ $apartment->address }}" required min="1" max="50" type="hidden"
                        id="address" name="address" type="text">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input value="{{ $apartment->lat }}" type="hidden" id="lat" name="lat" type="text">
                    <input value="{{ $apartment->long }}" type="hidden" id="long" name="long" type="text">
                </div>

                {{-- Invio --}}
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
    <!-- TomTOM JS -->
    <script src="{{ asset('js/edit.js') }}" defer></script>
@endsection
