<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        'date_in',
        'date_out',
        'client_id',
        'room_id'
    ];
    public function client(){
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
