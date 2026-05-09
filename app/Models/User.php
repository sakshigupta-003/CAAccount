<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role', 'name', 'full_name', 'date_of_birth', 'experience', 'gender',
        'preferred_communication_mode', 'phone', 'associated_mandir', 'city',
        'pincode', 'state', 'street_address', 'email', 'password', 'profile_picture',
        'aadhar_photo', 'pan_photo', 'languages_known', 'services_offered', 'certifications'
    ];

    


    protected $hidden = [
        'password', 'remember_token', 'aadhar_photo', 'pan_photo', // Hide sensitive
    ];

    protected $casts = [
          'role' => 'string',
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'languages_known' => 'array',
        'services_offered' => 'array',
        'aadhar_photo' => 'encrypted', // Encrypt path
        'pan_photo' => 'encrypted',
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
