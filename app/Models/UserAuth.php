<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $identity_type
 * @property string $email
 * @property string $unique_id
 * @property string $password
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 * @property \DateTime $deleted_at
 */
class UserAuth extends Model
{
    const IDENTITY_TYPE_FIREBASE = 'firebase';

    protected $table = 'user_auths';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'identity_type',
        'email',
        'unique_id',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'identity_type' => 'string',
        'email' => 'string',
        'unique_id' => 'string',
        'password' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ユーザー認証情報を登録する
     *
     * @param User $user
     * @param string $email
     * @param string $password
     * @param string $uniqueId
     * @return UserAuth
     * @throws \Exception
     */
    public static function create($user, $email, $password, $uniqueId)
    {
        $userAuth = new self();
        $userAuth->user_id = $user->id;
        $userAuth->identity_type = self::IDENTITY_TYPE_FIREBASE;
        $userAuth->email = $email;
        $userAuth->unique_id = $uniqueId;
        $userAuth->password = $password;
        $userAuth->save();
        return $userAuth;
    }
}
