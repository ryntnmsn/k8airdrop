<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'hex_color', 'is_visible'
    ];

    public function promos() {
        return $this->belongsToMany(Promo::class);
    }
}
