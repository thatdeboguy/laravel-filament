<?php

namespace App\Models;

use App\Models\Sectors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id', 'sector_id', 'name_tr', 'name_en'
    ];
    
    public function sector():  BelongsTo
    {
        return $this->belongsTo(Sectors::class);
    }
    
}
