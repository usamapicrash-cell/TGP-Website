<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    protected $fillable = ['service_type', 'first_name', 'last_name', 'email', 'phone', 'zip_code', 'message'];
}
