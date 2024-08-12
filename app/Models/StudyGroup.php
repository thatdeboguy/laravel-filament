<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyGroup extends Model
{
    use HasFactory;
    protected $fillable=[
        'title_tr', 'title_en','description_tr','description_en'
    ];
} 
