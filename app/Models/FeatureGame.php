<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'language_id', 'is_visible', 'url'
    ];

    public function language() {
        return $this->belongsTo(Language::class);
    }
}
