<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookingRequest;

class BookingController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('bookings.create', compact('services'));
    }

    public function store(StoreBookingRequest $request)
    {
        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'date' => $request->date,
            'time' => $request->time,
            'notes' => $request->notes,
        ]);

        return redirect('/')->with('success', 'Boeking geplaatst!');
    }

    public function adminIndex()
    {
        $bookings = Booking::with('service', 'user')->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }
}
