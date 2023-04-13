<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    // Search from input search
    public function index(Request $request)
    {
        $data = Apartment::where('name', 'LIKE', '%' . $request->input('search_text') . '%')->get();
        // dd($data);
        return response()->json($data);
    }

    // public function servicesCall(Request $request)
    // {
    //     $serviceId = $request->input('service_id');

    //     $data = Apartment::whereHas('services', function ($query) use ($serviceId) {
    //         $query->where('id', $serviceId);
    //     })->get();
    //     return response()->json($data);
    // }

    // Search from checkbox Services
    public function search(Request $request)
    {
        $services = $request->input('services', []);
        $query = Apartment::query();

        foreach ($services as $serviceId) {
            $query->orWhereHas('services', function ($query) use ($serviceId) {
                $query->where('id', $serviceId);
            });
        }

        $data = $query->get();
        
        return response()->json($data);
    }

    // Search from Rooms
    public function rooms(Request $request)
    {
        $services = $request->input('services', []);
        $rooms = $request->input('rooms', null);
        $query = Apartment::query();

        foreach ($services as $serviceId) {
            $query->orWhereHas('services', function ($query) use ($serviceId) {
                $query->where('id', $serviceId);
            });
        }

        if (!is_null($rooms)) {
            $query->where('rooms', '>=', $rooms);
        }

        $data = $query->get();
        return response()->json($data);
    }

    // Search from Beds
    public function beds(Request $request)
    {
        $services = $request->input('services', []);
        $beds = $request->input('beds', null);
        $query = Apartment::query();

        foreach ($services as $serviceId) {
            $query->orWhereHas('services', function ($query) use ($serviceId) {
                $query->where('id', $serviceId);
            });
        }

        if (!is_null($beds)) {
            $query->where('beds', '>=', $beds);
        }

        $data = $query->get();
        return response()->json($data);
    }


    // Bath
    public function bathrooms(Request $request)
    {
        $services = $request->input('services', []);
        $bathrooms = $request->input('rooms', null);
        $query = Apartment::query();
    
        foreach ($services as $serviceId) {
            $query->orWhereHas('services', function ($query) use ($serviceId) {
                $query->where('id', $serviceId);
            });
        }
    
        if (!is_null($bathrooms)) {
            $query->where('bathrooms', '>=', $bathrooms);
        }
    
        $data = $query->get();
        return response()->json($data);
    }
    
    
}
