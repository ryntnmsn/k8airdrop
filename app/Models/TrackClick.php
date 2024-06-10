<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackClick extends Model
{
    use HasFactory;

    protected $fillable = [
        'link', 'code', 'click_date'
    ];
}