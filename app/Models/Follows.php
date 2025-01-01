<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    protected $table = 'follows';

    protected $primaryKey = 'id';

    protected $fillable = [
        'follower_user_id',
        'followee_user_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'follower_user_id' => 'integer',
        'followee_user_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function follower()
    {
        return $this->belongsTo(User::class, 'id', 'follower_user_id');
    }

    public function followee()
    {
        return $this->belongsTo(User::class, 'id', 'followee_user_id');
    }
}
