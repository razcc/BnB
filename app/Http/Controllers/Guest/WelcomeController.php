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
}
