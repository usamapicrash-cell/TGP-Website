<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', 'heading', 'short_desc', 'full_description', 'image',
        'left_heading', 'items_left', 'right_heading', 'items_right', 'order'
    ];

    // Helper: Items ko array mein convert karne ke liye (Frontend par asani hogi)
    public function getLeftItemsArrayAttribute() {
        return $this->items_left ? explode(',', $this->items_left) : [];
    }

    public function getRightItemsArrayAttribute() {
        return $this->items_right ? explode(',', $this->items_right) : [];
    }
}