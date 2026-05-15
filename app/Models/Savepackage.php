<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Savepackage extends Model
{
    use HasFactory;

    protected $table = 'savepackage';

    protected $fillable = [
        'name',
        'gotra',
        'phone',
        'package',
        'price','payment_id','payment_status'
    ];
}
