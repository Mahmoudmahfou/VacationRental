<?php

namespace App\Http\Controllers\Api;

use App\Hotel\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HotelsController extends Controller
{
    // return all hotels
    public function index()
    {
        $allHotels = Hotel::all();
        $data = [
            "status" => 200,
            "message" => 'return all hotels',
            "data" => $allHotels
        ];
        return response()->json($data);
    }

    // return  one hotel by id
    public function showOneHotel($id)
    {
        $hotel = Hotel::find($id);
        if ($hotel) {
            $data = [
                'status' => 200,
                'message' => "this is the data of this hotel",
                'data' => $hotel
            ];
        } else {
            $data = [
                'status' => 404,
                'message' => "This Hotel Doesn't Exist",
                'data' => null
            ];
        }
        return response()->json($data);
    }

    // delete  a hotel from database
    public function deleteHotel($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'status' => 400,
                'message' => 'This Hotel does not exist',
                'data' => null
            ]);
        } else {

            // delete image when delete hotel
            if (File::exists(public_path('assets/images/' . $hotel->image))) {
                File::delete(public_path('assets/images/' . $hotel->image));
            } else {
                //dd('File does not exists.');
            }
            $hotel->delete();
            return response()->json([
                'status' => 205,
                'message' => 'The hotel has been deleted successfully'
            ]);
        }
    }

    // create one hotel
    public function CreateHotel(Request $request)
    {
        // validate the request using the rules
        $validatedData = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:5',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|min:10|string|max:200',
                'location' => 'required|min:5|string|max:20',
            ]
        );

        if ($validatedData->fails()) {
            $data = [
                'status' => 206,
                'message' => "Error in validation",
                'data' => $validatedData->errors()
            ];
            return response()->json($data);
        }


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

        $data = [
            'status' => 203,
            'message' => "Created  Successfully",
            'data' => $saveHotels
        ];
        return response()->json($data);
    }

    // update one Hotel
    public function updateHotels(Request $request, $id)
    {

        // validate the request using the rules
        $validatedData = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:5',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required|min:10|string|max:200',
                'location' => 'required|min:5|string|max:20',
            ]
        );

        if ($validatedData->fails()) {
            $data = [
                'status' => 206,
                'message' => "Error in validation",
                'data' => $validatedData->errors()
            ];
            return response()->json($data);
        }


        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'status' => 402,
                'message' => 'This Hotel does not exist',
                'data' => null
            ]);
        } else {
            
            // Delete image to server folder and save it into database
            if (File::exists(public_path('assets/images/' . $hotel->image))) {
                File::delete(public_path('assets/images/' . $hotel->image));
            } else {
                // dd('File does not exists.');
            }

            // save the image to the public/assets/images directory
            $imagePath = 'assets/images/';
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path($imagePath), $imageName);

            $hotel->update([
                'name' => $request->name,
                'image' => $imageName,
                'description' => $request->description,
                'location' => $request->location,
            ]);
            return response()->json([
                'status' => 208,
                'message' => 'The hotel has been updated successfully'
            ]);
        }
    }
}
