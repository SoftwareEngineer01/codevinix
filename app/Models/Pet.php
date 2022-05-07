<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['category', 'name', 'photoUrls', 'tags', 'status'];


    public function setTagsAttribute($value)
    {
        return $this->attributes['tags'] = implode(',', $value);
    }

    public function getTagsAttribute($value)
    {
        return explode(',', $value);
    }
    
    public function petCategory()
    {
        return $this->belongsTo(Category::class, 'category');
    }

}
