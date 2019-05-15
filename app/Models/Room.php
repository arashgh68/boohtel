<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    //
    public function getAvailableRooms($start_date, $end_date)
    {
        $availableRooms = DB::table('rooms as r')->select('r.id', 'r.name')
            ->whereRaw("r.id NOT IN (
                select b.room_id from reservations b 
                where not(b.date_out < '{$start_date}' or b.date_in > '{$end_date}')
            )")->orderBy('r.id')->get()->toArray();

        return $availableRooms;
    }

    public function isRoomBooked( $room_id, $start_date, $end_date )
    {

        $available_rooms = DB::table('reservations')
                        ->whereRaw("
                            NOT(
                                date_out < '{$start_date}' OR
                                date_in > '{$end_date}'
                                )
                        ")
                        ->where('room_id', $room_id)
                        ->count()
        ;
        return $available_rooms;

    }
}
