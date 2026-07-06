<?php

namespace App\Http\Controllers\Admins;

use App\Admin\Admin;
use App\Apartment\Apartment;
use App\Booking\Booking;
use App\Hotel\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // view login page
    public function viewLogin()
    {
        return  view('admins.login');
    }

    // check login
    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    // view count all admin , hotels and rooms
    public function index()
    {
        $adminsCount = Admin::select()->count();
        $hotelsCount = Hotel::select()->count();
        $roomsCount = Apartment::select()->count();
        return  view('admins.index', compact('adminsCount', "hotelsCount", "roomsCount"));
    }

    // view all admin
    public function allAdmins()
    {
        $allAdmins = Admin::select()->orderBy("id", "asc")->get();
        return  view('admins.alladmins', compact('allAdmins'));
    }

    // create admin
    public function createAdmins()
    {
        return  view('admins.create');
    }

    //  save new admin
    public function saveAdmins(Request $request)
    {
        // validate the request using the rules
        $validatedData = $request->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|email:rfc,dns|unique:admins',
            'password' => 'required|min:8',
        ]);

        $newAdmin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($newAdmin) {
            return redirect()->route('admins.all')->with('success', 'New admin has been added successfully!');
        }
    }

    // delete  admin by id
    public function deleteAdmin($id)
    {
        $deleteAdmin = Admin::find($id);

        $deleteAdmin->delete();

        if ($deleteAdmin) {
            return redirect()->route('admins.all')->with(['error' => "Admin " . $deleteAdmin->id . " Deleted Successfully"]);
        }
    }

    // view all hotels
    public function allHotels()
    {
        $allHotels = Hotel::select()->orderBy("id", "asc")->get();
        return  view('admins.allhotels', compact('allHotels'));
    }

    // create hotel
    public function createHotels()
    {
        return view('admins.createhotels');
    }

    // save hotel
    public function saveHotels(Request $request)
    {
        // validate the request using the rules
        $validatedData = $request->validate([
            'name' => 'required|string|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|min:10|string|max:200',
            'location' => 'required|min:5|string|max:20',
        ]);


        // save the image to the public/assets/images directory
        $imagePath = 'assets/images/';
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path($imagePath), $imageName);




        $saveHotels = Hotel::create([
            'name' => $request->name,
            'image' => $imageName,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        if ($saveHotels) {
            return redirect()->route('hotels.all')->with('success', 'New hotel has been added successfully!');
        }
    }

    // Edit hotels
    public function editHotels($id)
    {
        $getData = Hotel::findOrFail($id);
        return view("admins.updatehotels", compact("getData"));
    }

    // update Hotels
    public function updateHotels(Request $request, $id)
    {

        // validate the request using the rules
        $validatedData = $request->validate([
            'name' => 'required|string|min:5',
            'description' => 'required|min:10|string|max:200',
            'location' => 'required|min:5|string|max:20',
        ]);


        $hotel = Hotel::find($id);
        $hotel->update($request->all());
        if ($hotel) {
            return redirect()->route('hotels.all')->with(['success' => "Updated Successfully"]);
        }
    }

    // Delete hotel
    public function deleteHotels($id)
    {
        $hotel = Hotel::find($id);

        // delete image when delete hotel
        if (File::exists(public_path('assets/images/' . $hotel->image))) {
            File::delete(public_path('assets/images/' . $hotel->image));
        } else {
            //dd('File does not exists.');
        }

        $hotel->delete();

        if ($hotel) {
            return redirect()->route('hotels.all')->with(['success' => "Hotel Deleted Successfully"]);
        }
    }

    // view all rooms
    public function allRooms()
    {
        $allRooms = Apartment::select()->orderBy("id", "asc")->get();
        return  view('admins.allrooms', compact('allRooms'));
    }

    //  Create new room
    public function createRooms()
    {

        $hotels = Hotel::all();
        return view('admins.createrooms', compact('hotels'));
    }

    // save Room
    public function saveRooms(Request $request)
    {

        // validate the request using the rules
        $validatedData = $request->validate([
            'name' => 'required|string|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|numeric',
            'max_persons' => 'required|integer',
            'num_bed' => 'required|integer',
            'size' => 'required|numeric',
            'view' => 'required|string|min:5',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        //  upload image to server folder
        $imagePath = "assets/images/";
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path($imagePath), $imageName);

        $saveRooms = Apartment::create([
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
            'max_persons' => $request->max_persons,
            'num_bed' => $request->num_bed,
            'size' => $request->size,
            'view' => $request->view,
            'hotel_id' => $request->hotel_id,
        ]);
        if ($saveRooms) {
            return redirect()->route('rooms.all')->with(['success' => "Room Created Successfully !"]);
        }
    }

    // Delete hotel
    public function deleteRooms($id)
    {
        $room = Apartment::find($id);

        // delete image when delete hotel
        if (File::exists(public_path('assets/images/' . $room->image))) {
            File::delete(public_path('assets/images/' . $room->image));
        } else {
            //dd('File does not exists.');
        }

        $room->delete();

        if ($room) {
            return redirect()->route('rooms.all')->with(['success' => "Room Deleted Successfully"]);
        }
    }

    // view all bookings
    public function allBookings()
    {
        $bookings = Booking::orderBy("id", "asc")->get();
        return view('admins.allbookings', compact('bookings'));
    }

    // Edit bookings
    public function editStatus($id)
    {
        $getData = Booking::findOrFail($id);
        return view("admins.updatestatus", compact("getData"));
    }

    // update status
    public function updateStatus(Request $request, $id)
    {
        // validate the request using the rules
        $validatedData = $request->validate([
            'status' => 'required|string',
        ]);


        $status = Booking::find($id);
        $status->update($request->all());
        if ($status) {
            return redirect()->route('bookings.all')->with(['success' => "Updated Status Successfully"]);
        }
    }


    // Delete hotel
    public function deleteBookings($id)
    {
        $bookings = Booking::find($id);

        $bookings->delete();

        if ($bookings) {
            return redirect()->route('bookings.all')->with(['Deleted' => "Booking id: " . $bookings->id . " Deleted Successfully"]);
        }
    }
}
