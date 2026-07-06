<?php

namespace App\Http\Controllers\Hotels;

use App\Booking\Booking;
use Carbon\Carbon;
use App\Apartment\Apartment;
use App\Hotel\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\Session;

class HotelsController extends Controller
{
    public function rooms($id)
    {
        $getRooms = Apartment::select()->orderBy('id', 'desc')->take(6)
            ->where('hotel_id', $id)->get();
        return view('hotels.rooms', compact(['getRooms']));
    }

    // room details view
    public function roomDetails($id)
    {
        $getRoom = Apartment::find($id);
        return view('hotels.roomdetails', compact(['getRoom']));
    }

    // room Booking
    public function roomBooking(Request  $request, $id)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:rfc,dns',
            'name' => 'required|string|min:5',
            'phone_number' => 'required|min:11',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        $room = Apartment::find($id);
        $hotel = Hotel::find($id);

        if (strval(Carbon::now()->lessThan($request->check_in)) && strval(Carbon::now()->lessThan($request->check_out))) {

            // continue logic

            if ($request->check_in < $request->check_out) {

                $datetime1 = new DateTime($request->check_in);
                $datetime2 = new DateTime($request->check_out);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a'); //now do whatever you like with $days

                // continue logic

                $bookRooms = Booking::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone_number" => $request->phone_number,
                    "check_in" => $request->check_in,
                    "check_out" => $request->check_out,
                    "days" => $days,
                    "price" => $days * $room->price,
                    "user_id" => Auth::user()->id,
                    "room_name" => $room->name,
                    "hotel_name" => $hotel->name,
                    // "status" => $request->status,
                ]);

                // pay
                $totalPrice = $days * $room->price;
                $price = Session::put('price', $totalPrice);
                $getPrice = Session::get($price);

                return redirect()->route('hotel.pay');

                // return redirect()->route('hotels.rooms.details', $room->id)->with('success', 'Your booking is successfully');
                // echo 'you booked successfully';
            } else {
                return redirect()->route('hotels.rooms.details', $room->id)->with('error', 'Check-out date must be greater than check-in date');
                // echo 'check out date must be greater than check in date';
            }
        } else {
            return redirect()->route('hotels.rooms.details', $room->id)->with('error', 'Please choose dates in the future.');
            // echo 'Please choose dates in the future.';
        }
    }

    // paypal
    public function payWithPaypal()
    {

        return view('hotels.pay');
    }

    // pay success
    public function success()
    {
        Session::forget('price');
        return view('hotels.success');
    }
}
