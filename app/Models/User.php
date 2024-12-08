<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'email',
        'description',
        'profile_image_url',
        'location',
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'user_name' => 'string',
        'email' => 'string',
        'description' => 'string',
        'profile_image_url' => 'string',
        'location' => 'string',
        'date_of_birth' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function user_auths()
    {
        return $this->hasOne(UserAuth::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'user_id', 'id');
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'follower_user_id', 'id');
    }

    public function followees()
    {
        return $this->hasMany(Follow::class, 'followee_user_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }
}
