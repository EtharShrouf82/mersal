<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ScreenType extends Model
{
    use HasFactory;

    protected $with = [
        'defaultTranslation', // Preloading current locale translation at all times
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function translations(): hasOne
    {
        return $this->hasOne(ScreenTypeTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()->select('screen_type_id', 'title')->where('locale', app()->getLocale());
    }

    public function title(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->title ?? '',
        );
    }

    public function plan() : hasMany
    {
        return $this->hasMany(Plan::class);
    }
}
