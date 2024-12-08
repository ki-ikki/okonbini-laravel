<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLogo extends Model
{
    protected $table = 'store_logos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'store_id',
        'store_image_url',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'store_id' => 'integer',
        'store_image_url' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'id', 'store_id');
    }
}
