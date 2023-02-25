@extends('layouts.guest')

@section('content')
    {{-- Main --}}
    <div class="container-fluid">

        {{-- Lista Tutti Appartamenti --}}
        <div class="row">
            <div class="col-10 py-4 m-auto d-flex justify-content-center flex-wrap">

                @foreach ($apartments as $elem)
                    <a href="{{ route('guest.show', $elem['id']) }}">

                        <div class="card ms-3 mb-3" style="width: 18rem; height:18rem;">
                            {{-- Cover --}}
                            <img src="{{ asset('uploads/cover_image/' . $elem->cover_image) }}" class="card-img-top"
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
