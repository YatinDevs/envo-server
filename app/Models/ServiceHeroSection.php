<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image_url', 'description', 'brochure_url'
    ];
}
