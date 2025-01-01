<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $store_name
 * @property string $color_code
 * @property boolean $is_active
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Store extends Model
{
    protected $table = 'stores';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'store_name',
        'color_code',
        'is_active',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'store_name' => 'string',
        'color_code' => 'string',
        'is_active' => 'boolean',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'store_id', 'id');
    }
}
