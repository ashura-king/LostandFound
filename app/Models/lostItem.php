<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lostItem extends Model
{
  
    protected $fillable = [
        'item_name',
        'description',
        'location_found',
        'contact_info',
        'status',
        'image',
        'date_reported',
    ];
}