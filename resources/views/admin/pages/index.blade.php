@extends('layouts.app')
@section('title', 'My Apartments')


@section('content')
    <div class="container-fluid pt-5">

        <div class="d-flex align-items-center flex-column row">
            <h1 class="text-center">Your Apartments</h1>

            {{-- Allert Creazione Appartamento avvenuta con Successso --}}
            <div class="col-12 m-auto">

                @if (session('success'))
                    <div class="alert alert-success ml-4 mb-2 alert-dismissible fade show" role="alert">
                        {{ session('success') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            {{-- Cont Lista APP --}}
            <div class="col-10 m-auto d-flex justify-content-center flex-wrap">
                @foreach ($apartments as $elem)
                    <a href="{{ route('admin.apartments.show', $elem['id']) }}">
                        <div class="card ms-3 mb-3" style="width: 18rem; height:18rem;">

                            {{-- Name --}}
                            <div class="card-header text-center">
                                {{ $elem->name }}
                            </div>

                            {{-- Cover --}}
                            <img src="{{ asset('uploads/cover_image/' . $elem->cover_image) }}" class="h-50"
                                alt="cover image">

                            {{-- Body --}}
                            <div class="card-body">
                                <div class="card-text">
                                    {{ $elem->address }}
                                </div>
                                <div class="card-text">
                                    <strong>{{ $elem->price }}€ </strong> a notte
                                </div>
                            </div>
                        </div>

                    </a>
                @endforeach

            </div>

        </div>
    </div>
    </div>
@endsection
