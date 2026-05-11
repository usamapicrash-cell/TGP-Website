<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GallerySubCategory extends Model
{
    protected $fillable = ['gallery_category_id', 'name', 'slug'];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }

    public function items()
    {
        return $this->hasMany(GalleryItem::class);
    }
}