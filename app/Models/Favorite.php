<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $primaryKey = 'id';

    protected $fillable = [
        'item_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'item_id' => 'integer',
        'user_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
