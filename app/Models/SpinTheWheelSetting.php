<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpinTheWheelSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_winners'
    ];
}
