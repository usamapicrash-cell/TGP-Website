<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['blog_category_id', 'title', 'slug', 'excerpt', 'content', 'image', 'date'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
