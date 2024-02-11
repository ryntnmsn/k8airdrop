<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type'
    ];

    public function promo() : BelongsToMany{
        return $this->belongsToMany(Promo::class);
    }

    public function choices() : BelongsToMany {
        return $this->belongsToMany(Choice::class);
    }

}
