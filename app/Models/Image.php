<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        'imageable_type',
        'imageable_id',

    ];
    public function imageable(): MorphMany
    {
        return $this->morphToMany();
    }
}
