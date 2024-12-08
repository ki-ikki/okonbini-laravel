<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'item_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_name',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'category_name' => 'string',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'item_category_id', 'id');
    }
}
