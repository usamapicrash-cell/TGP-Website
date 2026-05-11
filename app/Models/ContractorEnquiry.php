<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractorEnquiry extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'service_type', 'message', 'status'];
}
