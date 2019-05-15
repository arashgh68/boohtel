<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'title',
        'name',
        'last_name',
        'address',
        'email',
        'city',
        'state',
        'zip_code'
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
