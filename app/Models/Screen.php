<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Screen extends Model
{
    use HasFactory;
    protected $with = [
        'defaultTranslation', // Preloading current locale translation at all times
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class,'citie_id');
    }

    public function screen_type(): BelongsTo
    {
        return $this->belongsTo(ScreenType::class,'citie_id');
    }


    public function translations(): hasOne
    {
        return $this->hasOne(ScreenTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()->select('screen_id', 'title','description')->where('locale', app()->getLocale());
    }

    public function title(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->title ?? '',
        );
    }

    public function description(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->description ?? '',
        );
    }

    public function images() : hasMany
    {
        return $this->hasMany(ScreenImage::class);
    }
}
