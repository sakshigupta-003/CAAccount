<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

protected $fillable  =['bristolcategory_id','name','price','short_description','status'];  


    public function bristolCategory()
        {
            return $this->belongsTo(Project::class, 'bristolcategory_id');
        }



}
