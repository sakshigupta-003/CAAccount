<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipApplication extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'dob', 'gender', 'member_type',
        'interests', 'interested_programs', 'accommodations_needed',
        'street', 'city', 'state_province', 'postal_code', 'country',
        'message', 'status',
    ];

    protected $casts = [
        'interests' => 'array',
        'dob'       => 'date',
    ];
}