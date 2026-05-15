<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     use HasFactory;
    protected $fillable  = ['maincategory_id','title', 'slug', 'status', 'image'];

     public function properties()
    {
        return $this->hasMany(Property::class);
    }


public function category()
{
    return $this->belongsTo(MainCategory::class, 'maincategory_id');
}



}
