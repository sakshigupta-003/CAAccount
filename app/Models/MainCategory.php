<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{

    protected $table = 'main_categories';
    protected $fillable =[
      'name',
    ];


     public function subCategories()
    {
        return $this->hasMany(Project::class, 'maincategory_id');
    }

}
