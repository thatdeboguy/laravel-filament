<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schools extends Model
{
    use HasFactory;

    public function country():BelongsTo{
        return $this->belongsTo(Country::class);
    }
    protected $fillable =[
        'id', 'name_tr', 'name_en', 'country_code'
    ];
}
