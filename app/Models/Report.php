<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['reported_by', 'reported_user_id', 'reason', 'description', 'status'];

    public function reporter() {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function reportedUser() {
        return $this->belongsTo(User::class, 'reported_user_id');
    }
}
