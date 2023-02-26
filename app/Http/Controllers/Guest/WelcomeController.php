<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();


        $service = Service::all();

        $user = Auth::user();


        return view('guest.welcome', compact('apartments', 'user', 'service'));
    }


    public function show($id)
    {
        $apartment = Apartment::with('services')->findOrFail($id);
        //dd($apartment);
        return view('guest.show', compact('apartment'));
    }

    // public function axios()
    // {
    //     $app = Apartment::all();
    //     return response()->json($app);
    // }

    // public function axiosRooms()
    // {
    //     $appartments = Apartment::with('services')->get();

    //     $apartment_service = Apartment::select('apartments.id', 'apartments.name', 'apartments.description', 'apartments.cover_image', 'apartments.rooms', 'apartments.beds', 'apartments.bathrooms', 'apartments.mq', 'apartments.accomodation', 'apartments.lat', 'apartments.long', 'apartments.address', 'apartments.available', 'apartments.price', 'apartments.user_id', 'apartment_service.apartment_id', 'apartment_service.service_id')
    //         ->join('apartment_service', 'apartments.id', '=', 'apartment_service.apartment_id')
    //         ->join('services', 'services.id', '=', 'apartment_service.service_id')
    //         ->get();

    //     return response()->json(compact('appartments'));
    // }
}
