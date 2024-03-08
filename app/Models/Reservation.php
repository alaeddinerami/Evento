<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable =[
        'eventID',
        'status',
        'clientID',
    ];
    public function clients(){
        return $this->belongsTo(Client::class, 'clientID');
    }

    public function events(){
        return $this->belongsTo(Event::class, 'eventID');
    }
}
