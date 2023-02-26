@extends('layouts.guest')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">{{ $apartment->name }}</h1>

        <div class="row">
            <div class="col-10 m-auto d-flex justify-content-center">
                <img src="{{ asset('uploads/cover_image/' . $apartment->cover_image) }}" alt="Immagine Cover">
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

            {{-- Mesaggi --}}
            <div class="col-4 m-auto border">

            </div>


            {{-- Mappa --}}
            <div class="col-12 mt-5 d-flex flex-column justify-content-center align-items-center">
                <h2 class="mb-3">Dove ti troverai:</h2>
                <input type="hidden"  value="{{ $apartment->lat }}" id="lat" type="text">
                <input type="hidden"  value="{{ $apartment->long }}" id="long" type="text">

                <div id="map" class="map" style="width: 500px; height: 500px;"></div>

            </div>
        </div>

    </div>

@endsection
