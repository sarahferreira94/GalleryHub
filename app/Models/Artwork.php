<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'idartwork', 'name', 'idCountry', 'idowner', 'idartist'
    ];

    protected $table = 'arts.artwork';
}
