<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'min_age', 'max_age', 'location', 'interests', 'marital_status'];

    protected $casts = [
        'interests' => 'array', // Mengonversi kolom minat menjadi array
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
