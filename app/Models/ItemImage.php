<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    protected $table = 'item_images';

    protected $primaryKey = 'id';

    protected $fillable = [
        'item_image_url',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'item_image_url' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_image_id', 'id');
    }
}
