@extends('layouts.guest')

@section('content')
    <div id="advanced_search_cont"
        class=" transition_custom advanced_search_cst w-100 h-25 d-flex flex-column align-items-center justify-content-center py-3">
        <div class="mb-3">
            @foreach ($service as $item)
                <button type="button" class="ms-4 btn btn-primary">{{ $item->name }}</button>
            @endforeach
        </div>

        <div class="d-flex px-3">
            <div class="me-2">
                <label for="rooms">Min number of Rooms:</label>
                <input id="rooms" name="rooms" type="number" placeholder="min rooms">
            </div>

            <div class="me-2">
                <label for="rooms">Min number of Beds:</label>
                <input id="rooms" name="rooms" type="number" placeholder="min beds">
            </div>

            <div class="me-2">
                <label for="rooms">Bathrooms:</label>
                <input id="rooms" name="rooms" type="number" placeholder="bathrooms">
            </div>

            <div class="me-2">
                <label for="rooms">Min Mq:</label>
                <input id="rooms" name="rooms" type="number" placeholder="min mq">
            </div>

            <div class="me-2">
                <label for="rooms">Max Mq:</label>
                <input id="rooms" name="rooms" type="number" placeholder="max mq">
            </div>

            <div class="me-2">
                <label for="rooms">Max number of people:</label>
                <input id="rooms" name="rooms" type="number" placeholder="accomodation">
            </div>

            <div class="me-2">
                <label for="rooms">Price max:</label>
                <input id="rooms" name="rooms" type="number" placeholder="price max">
            </div>

            <div class="me-2">
                <label for="rooms">Price min:</label>
                <input id="rooms" name="rooms" type="number" placeholder="price min">
            </div>

        </div>


    </div>

    {{-- Main --}}
    <div class="container-fluid transition_custom">

        {{-- Lista Tutti Appartamenti --}}
        <div class="row">
            <div class="col-10 py-4 m-auto d-flex justify-content-center flex-wrap">

                @foreach ($apartments as $elem)
                    <a href="{{ route('guest.show', $elem['id']) }}">

                        <div class="card ms-3 mb-3" style="width: 18rem; height:18rem;">
                            {{-- Cover --}}
                            <img src="{{ asset('uploads/cover_image/' . $elem->cover_image) }}" class="h-50 card-img-top"
                                alt="cover_image">

                            {{-- Descrizione --}}
                            <div class="card-body">
                                {{-- Titolo --}}
                                <h5 class="card-title">{{ $elem->name }}</h5>
                                <div>{{ $elem->price }} a notte</div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection
