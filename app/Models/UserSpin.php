<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSpin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rewards',
        'joined_date',
        'is_winner',
        'ip'
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
