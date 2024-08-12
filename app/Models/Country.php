<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    public function school():HasMany{
        return $this->hasMany(Schools::class);
    }
    protected $fillable = [
        'code', 'name_tr', 'name_en'        
    ];
}
