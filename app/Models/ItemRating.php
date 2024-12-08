<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemRating extends Model
{
    protected $table = 'item_ratings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'item_id',
        'store_id',
        'favorite_weekly_count',
        'favorite_monthly_count',
        'favorite_total_count',
        'review_weekly_count',
        'review_monthly_count',
        'review_total_count',
        'sort_date',
        'created_at',
    ];

    protected $casts = [
        'item_id' => 'integer',
        'store_id' => 'integer',
        'favorite_weekly_count' => 'integer',
        'favorite_monthly_count' => 'integer',
        'favorite_total_count' => 'integer',
        'review_weekly_count' => 'integer',
        'review_monthly_count' => 'integer',
        'review_total_count' => 'integer',
        'sort_date' => 'integer',
        'created_at' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'id', 'store_id');
    }
}
