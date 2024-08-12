<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobTitle extends Model
{
    use HasFactory;
    public function iscoCodes():HasMany{

        return $this->hasMany(IscoCodes::class);
    }
    protected $fillable =[
        'id', 'isco_id', 'titleTR', 'titleEN', 'descriptionTR', 'descriptionEN', 'keywordsTR', 'keywordsEN'
    ];
}
