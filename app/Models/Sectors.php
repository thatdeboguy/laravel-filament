<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sectors extends Model
{
    use HasFactory;

    public function industry():HasMany{
        
        return $this->hasMany(Industry::class);
    }
    protected $fillable = [
        'id', 'name_tr', 'name_en', 'is_modifiable '
    ];
}
