<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id','name', 'phone', 'email', 'address', 'city',
        'state', 'country','details', 'pincode', 'aadhar_number', 'pan_number'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}