<?php

namespace App\Http\Controllers\Users;

use App\Booking\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function myBookings()
    {
        $bookings = Booking::select()->orderBy('id', 'asc')->where('user_id', Auth::user()->id)->get();
        return view('users.bookings', compact('bookings'));
    }
}
