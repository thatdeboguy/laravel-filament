<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    protected $fillable =[
        'title','name','slug','geoposition',
    ];

    protected $casts = [
        'name' => 'json',
        'geoposition' => 'json'
    ];
}
