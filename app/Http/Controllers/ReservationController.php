<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\Room;

class ReservationController extends Controller
{
    //
    public function bookRoom($client_id, $room_id, $date_in, $date_out)
    {

        $data = [
            'date_in' => $date_in,
            'date_out' => $date_out,
            'client_id' => $client_id,
            'room_id' => $room_id,
        ];
        if (Room::find($room_id)->isRoomBooked($room_id, $date_in, $date_out)) {
            abort(405, 'Trying to book an already booked room');
        }
        Reservation::create($data);
        return redirect('clients');
    }
}
