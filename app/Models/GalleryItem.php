<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = ['gallery_sub_category_id', 'image', 'title', 'location'];

    public function subCategory()
    {
        return $this->belongsTo(GallerySubCategory::class, 'gallery_sub_category_id');
    }
}