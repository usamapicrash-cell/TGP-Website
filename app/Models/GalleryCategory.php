<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function subCategories()
    {
        return $this->hasMany(GallerySubCategory::class);
    }
}