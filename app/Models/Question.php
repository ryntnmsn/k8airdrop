<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_title', 'question_type', 'promo_id'
    ];

    public function promo() : BelongsToMany{
        return $this->belongsToMany(Promo::class);
    }

    public function choices() : HasMany {
        return $this->hasMany(Choice::class);
    }

    public function questionChoices() : HasMany {
        return $this->hasMany(Choice::class);
    }


}
