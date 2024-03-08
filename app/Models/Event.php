<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'lieu' , 
        'placesdisponible', 
        'description', 
        'date', 
        'typeValidation',
        'isValidByAdmin',
        'categoryID', 
        'organizerID',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function organizers()
    {
        return $this->belongsTo(Organisateur::class, 'organizerID');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'eventID');
    }
}
