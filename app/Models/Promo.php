<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Promo extends Model implements Viewable
{
    use InteractsWithViews;
    use Commentable;
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'platforms', 'language_id', 'description', 'terms', 'article', 'prize_pool', 'is_visible', 'start_date', 'end_date', 'image', 'type', 'game_type', 'is_banner', 'is_featured', 'button_name', 'button_link'
    ];

    // protected $appends = [
    //     'image_url',
    // ];

    public function platforms() : BelongsToMany {
        return $this->belongsToMany(Platform::class);
    }

    public function language() : BelongsTo {
        return $this->belongsTo(Language::class);
    }

    public function questions() : BelongsToMany {
        return $this->belongsToMany(Question::class);
    }

    public function users() : BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function participants() : HasMany {
        return $this->hasMany(Participant::class);
    }

}
