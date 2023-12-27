<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'language_id', 'description', 'terms', 'article', 'prize_pool', 'is_visible', 'start_date', 'end_date', 'image', 'type', 'game_type', 'is_banner', 'is_featured', 'button_name', 'button_link'
    ];
}
