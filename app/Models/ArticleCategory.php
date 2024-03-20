<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'image'
    ];

    public function articles(): BelongsToMany {
        return $this->belongsToMany(Article::class);
    }
}
