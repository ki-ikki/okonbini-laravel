<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'content',
        'reply_review_id',
        'item_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'content' => 'string',
        'reply_review_id' => 'integer',
        'item_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    public function reviewImage()
    {
        return $this->hasMany(ReviewImage::class, 'review_id', 'id');
    }
}
