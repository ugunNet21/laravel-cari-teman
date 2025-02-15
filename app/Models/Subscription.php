<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'plan', 'start_date', 'end_date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function isActive() {
        return now()->between($this->start_date, $this->end_date);
    }
}
