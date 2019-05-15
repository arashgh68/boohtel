<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Client;

class RoomController extends Controller
{
    //
    public function checkAvailableRooms($client_id, Request $request)
    {
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;        
        $client = new Client();
        $room = new Room();

        $data = [
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'rooms' => $room->getAvailableRooms($dateFrom, $dateTo),
            'client' => $client->find($client_id)
        ];
        return view('room.checkAvailableRooms', $data);
    }
}
