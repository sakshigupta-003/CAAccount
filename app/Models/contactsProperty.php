<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class contactsProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'name',
        'email',
        'phone',
        'service',
        'what_do_you_want',
        'message',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class); // Assuming Property model exists
    }
}
