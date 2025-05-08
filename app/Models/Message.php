<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'promo_id',
        'message',
    ];


    public function participant() {
        return $this->hasMany(Participant::class);
    }

}

