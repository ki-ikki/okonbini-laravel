<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'email',
        'content',
        'created_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'email' => 'string',
        'content' => 'string',
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
