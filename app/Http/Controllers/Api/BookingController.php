<?php

namespace App\Http\Controllers\Api;

use App\Booking\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookingController extends Controller
{
    // return all bookings
    public function index()
    {
        $allbookings = Booking::all();
        $data = [
            "status" => 200,
            "message" => 'return all bookings',
            "data" => $allbookings
        ];
        return response()->json($data);
    }

    // return  one booking by id
    public function showOneBooking($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $data = [
                'status' => 200,
                'message' => "this is the data of this booking",
                'data' => $booking
            ];
        } else {
            $data = [
                'status' => 404,
                'message' => "This booking Doesn't Exist",
                'data' => null
            ];
        }
        return response()->json($data);
    }

    // delete a booking from database
    public function deleteBooking($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'status' => 400,
                'message' => 'This booking does not exist',
                'data' => null
            ]);
        } else {
            $booking->delete();
            return response()->json([
                'status' => 205,
                'message' => 'The booking has been deleted successfully'
            ]);
        }
    }
}
