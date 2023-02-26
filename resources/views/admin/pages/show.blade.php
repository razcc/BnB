@extends('layouts.app')
@section('title', 'Show-Appartment')


@section('content')
    <div class="container-fluid pt-5">
        <h1 class="text-center">{{ $apartment->name }}</h1>

        <div class="row">
            <div class="col-10 m-auto d-flex justify-content-center">
                <img class="w-50" src="{{ asset('uploads/cover_image/' . $apartment->cover_image) }}" alt="Immagine Cover">
            </div>

            {{-- Info Appartamento --}}
            <div class="col-6 m-auto border pt-4">

                <h5 class="mt-5">Descrizione:</h5>
                <p>
                    {{ $apartment->description }}
                </p>

                <h5 class="mt-5">Servizi:</h5>
                @foreach ($apartment->services as $elem)
                    <i class="{{ $elem->icon }}"></i>
                    <span class="badge bg-secondary">{{ $elem->name }}</span>
                @endforeach

                <h5 class="mt-5">Accomodation info:</h5>
                <div>
                    <ul>
                        <li>
                            Stanze: {{ $apartment->rooms }}
                        </li>
                        <li>
                            Letti: {{ $apartment->beds }}
                        </li>
                        <li>
                            Bagni: {{ $apartment->bathrooms }}
                        </li>
                        <li>
                            Persone massime: {{ $apartment->accomodation }}
                        </li>
                    </ul>
                </div>
            </div>

            {{-- EDIT e DESTROY --}}
            <div class="col-4 d-flex flex-column justify-content-center">
                {{-- EDIT --}}
                <button class="btn btn-warning w-50 mb-4">
                    <a href="{{ route('admin.apartments.edit', $apartment->id) }}">Edit</a>
                </button>

                {{-- DESTROY --}}
                <form method="POST" action="{{ route('admin.apartments.destroy', $apartment['id']) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="p-2 my-1 btn btn-danger w-50">
                        Delete your apartment
                    </button>
                </form>
            </div>


            {{-- Mappa --}}
            <div class="col-12 mt-5 d-flex flex-column justify-content-center align-items-center">
                <h2 class="mb-3">Dove si trova il tuo appartamento:</h2>
                <input type="hidden" value="{{ $apartment->lat }}" id="lat" type="text">
                <input type="hidden" value="{{ $apartment->long }}" id="long" type="text">

                <div id="map" class="map  " style="width: 500px; height: 500px;"></div>

            </div>
        </div>

    </div>
    <!-- TomTOM JS -->
    <script src="{{ asset('js/show.js') }}" defer></script>
@endsection
