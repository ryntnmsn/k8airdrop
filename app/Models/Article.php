<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Article extends Model implements Viewable
{
    use InteractsWithViews;
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'short_description', 'language_id', 'is_visible', 'image', 'demo_url', 'article_sub_category_id'
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

    public function subcategory() {
        return $this->belongsTo(ArticleSubCategory::class);
    }
}
