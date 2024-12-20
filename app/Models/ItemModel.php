<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
        protected $table = 'items';
    protected $fillable = [
        'item_name',
        'item_description',
        'status',
        'location',
        'image_url',
        'category_id',
    ];
}
