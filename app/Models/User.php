<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $user_name
 * @property string $description
 * @property string $profile_image_url
 * @property string $location
 * @property \Date $date_of_birth
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property \DateTime $deleted_at
 */
class User extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_name',
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
        'description' => 'string',
        'profile_image_url' => 'string',
        'location' => 'string',
        'date_of_birth' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function userAuths()
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

    /**
     * ユーザー情報を登録する
     *
     * @param String $user_name
     * @param Date $date_of_birth
     * @return User
     * @throws \Exception
     */
    public static function create(
        $user_name,
        $date_of_birth
    ) {
        $now = new \DateTime();
        $user = new self();
        $user->user_name = $user_name;
        $user->description = null;
        $user->profile_image_url = null;
        $user->location = null;
        $user->date_of_birth = $date_of_birth;
        $user->created_at = $now;
        $user->updated_at = $now;
        $user->save();
        return $user;
    }
}
