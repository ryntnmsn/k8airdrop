<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'article_category_id'
    ];

    public function article_category() {
        return $this->belongsTo(ArticleCategory::class);
    }
}
