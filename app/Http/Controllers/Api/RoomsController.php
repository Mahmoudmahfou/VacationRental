<?php

namespace App\Http\Controllers\Api;

use App\Apartment\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomsController extends Controller
{
    // return all Rooms
    public function index()
    {
        $allRooms = Apartment::all();
        $data = [
            "status" => 200,
            "message" => 'return all Rooms',
            "data" => $allRooms
        ];
        return response()->json($data);
    }

    // return  one room by id
    public function showOneRoom($id)
    {
        $room = Apartment::find($id);
        if ($room) {
            $data = [
                'status' => 200,
                'message' => "this is the data of this room",
                'data' => $room
            ];
        } else {
            $data = [
                'status' => 404,
                'message' => "This Room Doesn't Exist",
                'data' => null
            ];
        }
        return response()->json($data);
    }

    // delete  a room from database
    public function deleteRoom($id)
    {
        $room = Apartment::find($id);

        if (!$room) {
            return response()->json([
                'status' => 400,
                'message' => 'This room does not exist',
                'data' => null
            ]);
        } else {

            // delete image when delete room
            if (File::exists(public_path('assets/images/' . $room->image))) {
                File::delete(public_path('assets/images/' . $room->image));
            } else {
                //dd('File does not exists.');
            }
            $room->delete();
            return response()->json([
                'status' => 205,
                'message' => 'The room has been deleted successfully'
            ]);
        }
    }
}
