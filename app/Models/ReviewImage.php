<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewImage extends Model
{
    protected $table = 'review_images';

    protected $primaryKey = 'id';

    protected $fillable = [
        'review_id',
        'review_image_url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'review_id' => 'integer',
        'review_image_url' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class, 'id', 'review_id');
    }
}
