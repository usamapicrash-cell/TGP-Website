<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['meta_title', 
    'meta_description', 
    'meta_keywords', 'heading_1', 'heading_2', 'description'];
}
