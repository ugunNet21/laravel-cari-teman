<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchFriend extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'matched_user_id', 'status', 'matched_at', 'is_mutual'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function matchedUser()
    {
        return $this->belongsTo(User::class, 'matched_user_id');
    }
}
