<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
        protected $table = 'items';
    protected $fillable = [
        'user_id',
        'item_name',
        'item_description',
        'status',
        'location',
        'image_url',
        'category_id',
        'owner_phone_number',
    ];
}
