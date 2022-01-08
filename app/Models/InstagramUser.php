<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstagramUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'username',
        'full_name',
        'profile_picture',
        'bio',
        'website',
        'is_private',
        'media_count',
        'follows_count',
        'followed_by_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $hidden = [
        'password',
    ];
}
