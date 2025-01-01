<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $store_id
 * @property int $item_category_id
 * @property int $item_image_id
 * @property string $item_name
 * @property string $item_info
 * @property float $price
 * @property \Carbon\Carbon $release_date
 * @property array $search_vector
 * @property boolean $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Item extends Model
{
    protected $table = 'items';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'store_id',
        'item_category_id',
        'item_image_id',
        'item_name',
        'item_info',
        'price',
        'release_date',
        'search_vector',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'store_id' => 'integer',
        'item_category_id' => 'integer',
        'item_image_id' => 'integer',
        'item_name' => 'string',
        'item_info' => 'string',
        'price' => 'float',
        'release_date' => 'datetime',
        'search_vector' => 'array',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'id', 'store_id');
    }

    public function ItemRating()
    {
        return $this->hasMany(ItemRating::class, 'item_id', 'id');
    }

    public function ItemCategory()
    {
        return $this->hasOne(ItemCategory::class, 'id', 'item_category_id');
    }

    public function ItemImage()
    {
        return $this->hasOne(ItemImage::class, 'id', 'item_image_id');
    }
}
