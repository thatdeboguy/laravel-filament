<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
    use HasFactory;
    protected $fillable =[
        'name_tr', 'name_en', 'description', 'is_modifiable', 'last_modified'
    ];
}
