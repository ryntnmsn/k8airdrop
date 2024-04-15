<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'promo_id',
        'name',
        'k8_username',
        'email',
        'retweet_url',
        'image',
        'sns_id',
        'comment',
        'is_winner',
        'ip',
    ];

    public function choices() {
        return $this->belongsToMany(Choice::class);
    }

}
