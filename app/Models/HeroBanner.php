<?php
// app/Models/HeroBanner.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroBanner extends Model
{
    protected $table = 'herobanners';
    
    protected $fillable = [
        'title', 'move_text', 'image'
    ];
}