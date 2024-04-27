<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'short_description', 'language_id', 'is_visible', 'image', 'demo_url'
    ];

    public function categories(): BelongsToMany {
        return $this->belongsToMany(ArticleCategory::class);
    }

    public function language(): BelongsTo {
        return $this->belongsTo(Language::class);
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(ArticleTag::class);
    }
}
