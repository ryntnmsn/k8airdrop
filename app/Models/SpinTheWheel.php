<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpinTheWheel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rewards',
        'probability',
        'winners_count'
    ];
}
