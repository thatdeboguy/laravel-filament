<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IscoCodes extends Model
{
    use HasFactory;
    public function jobTitle():BelongsTo{
        
        return $this->belongsTo(JobTitle::class);
    }

    protected $fillable =[
        'id', 'code','nameTR','nameEN','descriptionTR','descriptionEN', 
    ];
}
