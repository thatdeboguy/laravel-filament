<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopCategory extends Model
{
    use HasFactory;
    public function subCategory():BelongsTo{
        
        return $this->belongsTo(SubCategory::class);
    }
    protected $fillable =[
        'id', 'name_TR', 'name_EN'
    ];
}
