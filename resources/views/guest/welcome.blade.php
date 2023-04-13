@extends('layouts.guest')

@section('content')
    <div id="advanced_search_cont"
        class=" transition_custom advanced_search_cst w-100 h-25 d-flex flex-column align-items-center justify-content-center py-3">
        <div class="mb-3">
            @foreach ($service as $item)
                <div class="form-check">
                    <input class="form-check-input service-checkbox" type="checkbox" name="service[]"
                        value="{{ $item->id }}" id="service{{ $item->id }}">
                    <label class="form-check-label" for="service{{ $item->id }}">
                        {{ $item->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="d-flex px-3 flex-wrap">
            {{-- Rooms --}}
            <div class="me-2">
                <label for="min-rooms">Min number of Rooms:</label>
                <input min="1" id="min-rooms" type="number" placeholder="min rooms">
            </div>

            {{-- BEDS --}}
            <div class="me-2">
                <label for="beds">Min number of Beds:</label>
                <input min="1" name="beds" id="min-beds" type="number" placeholder="min beds">
            </div>


            {{-- BATHROOMS --}}
            <div class="me-2">
                <label for="rooms">Bathrooms:</label>
                <input min="1" name="rooms" id="min_bathrooms" type="number" placeholder="bathrooms">
            </div>
            


            {{-- MIN MQ --}}
            <div class="me-2">
                <label for="rooms">Min Mq:</label>
                <input min="1" name="rooms" type="number" placeholder="min mq">
            </div>

            {{-- MAX MQ --}}
            <div class="me-2">
                <label for="rooms">Max Mq:</label>
                <input name="rooms" type="number" placeholder="max mq">
            </div>

            {{-- ACCOMODATION --}}
            <div class="me-2">
                <label for="rooms">Max number of people:</label>
                <input name="rooms" type="number" placeholder="accomodation">
            </div>

            {{-- PREZZO MASSIMO --}}
            <div class="me-2">
                <label for="rooms">Price max:</label>
                <input name="rooms" type="number" placeholder="price max">
            </div>

            {{-- PREZZO MINIMO --}}
            <div class="me-2">
                <label for="rooms">Price min:</label>
                <input name="rooms" type="number" placeholder="price min">
            </div>

        </div>


    </div>


    {{-- Main --}}
    <div class="container-fluid transition_custom">

        {{-- Lista Tutti Appartamenti --}}
        <div class="row">
            <div id="search_results" class="col-10 py-4 m-auto d-flex justify-content-center flex-wrap">

                {{-- @foreach ($apartments as $elem)
                    <a href="{{ route('guest.show', $elem['id']) }}">

                        <div class="card ms-3 mb-3" style="width: 18rem; height:18rem;">
                            
                            <img src="{{ asset('uploads/cover_image/' . $elem->cover_image) }}" class="h-50 card-img-top"
                                alt="cover_image">

                            
                            <div class="card-body">
                                
                                <h5 class="card-title">{{ $elem->name }}</h5>
                                <div>{{ $elem->price }} a notte</div>
                            </div>
                        </div>
                    </a>
                @endforeach --}}

            </div>
        </div>

    </div>
    
    <script src="{{ asset('js/axios.js') }}"></script>
@endsection
