<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    protected $table = 'user_auths';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'identity_type',
        'password',
        'token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'identity_type' => 'string',
        'password' => 'string',
        'token' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
