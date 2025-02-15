<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'location',
        'relationship_status',
        'interests',
        'gender',
        'date_of_birth'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    // Relasi ke Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Relasi ke Matches (sebagai pengirim)
    public function matches()
    {
        return $this->hasMany(MatchFriend::class, 'user_id');
    }

    // Relasi ke Messages (sebagai pengirim)
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // Relasi ke Messages (sebagai penerima)
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function isPremium()
    {
        return $this->subscription && $this->subscription->isActive();
    }
    public function preference()
    {
        return $this->hasOne(Preference::class);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
