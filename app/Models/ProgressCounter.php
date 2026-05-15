<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressCounter extends Model
{
    protected $fillable = ['number', 'title', 'sort_order', 'active'];
}
