@extends('layouts.app')
@section('title', 'My Apartments')


@section('content')
    <div class="container-fluid">

        <div class="d-flex align-items-center flex-column row">

            {{-- Allert Creazione Appartamento avvenuta con Successso --}}
            <div class="col-12 m-auto">
                <h1 class="">Your Apartments</h1>
                @if (session('success'))
                    <div class="alert alert-success ml-4 mb-2 alert-dismissible fade show" role="alert">
                        {{ session('success') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            {{-- Cont Lista APP --}}
            <div class="container-fluid d-flex px-0">

                <div class="d-flex flex-wrap">
                    @foreach ($apartments as $elem)
                        {{-- <a href="{{ route('admin.apartments.show', $elem['id']) }}"> --}}
                        <a href="{{ route('admin.apartments.show', $elem['id']) }}"
                            class="apartment-card border-0 col-lg-2 col-md-4 img-fluid p-2 col-sm-12">
                            <div class="card-relative">
                                <i class="fa-regular fa-eye"></i>
                                <img src="{{asset('uploads/cover_image/'.$elem->cover_image)}}" class="card-img coverimg rounded-4"
                                    alt="cover image">
                            </div>
                            <div class="py-3 px-0">

                                <h6 class="mt-2 card-element">{{ $elem->address }}</h6>
                                <h6 class="mt-0 card-element"> <strong>{{ $elem->price }}€ </strong> a notte</h6>

                            </div>
                        </a>
                        {{-- </a> --}}
                    @endforeach
                </div>


            </div>
        </div>
    </div>
@endsection
