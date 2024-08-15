<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    public function topCategory():HasMany{
        
        return $this->hasMany(TopCategory::class);
    }
    protected $fillable = [
        'id',"top_category_id","name_tr","name_en"
    ];
}
