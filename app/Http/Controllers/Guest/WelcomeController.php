<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(){

        $apartments = Apartment::all();

        $user = Auth::user();


        return view('guest.welcome', compact('apartments', 'user'));
    }
}
