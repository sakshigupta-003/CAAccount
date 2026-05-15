<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $table = 'about_sections';

    protected $fillable = [
        'sub_title', 'title_line1', 'title_line2', 'logo_image',
        'center_image', 'description', 'button_text', 'button_link'
    ];
}
