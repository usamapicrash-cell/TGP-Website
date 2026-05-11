<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;

    // Mass assignment ke liye fields allow kar diye
    protected $fillable = [
        'meta_title', 
        'meta_description', 
        'meta_keywords',
        'heading_1', 
        'heading_2', 
        'description'
    ];
}