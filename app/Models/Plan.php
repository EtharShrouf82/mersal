<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;
    protected $with = [
        'defaultTranslation', // Preloading current locale translation at all times
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function screen_type(): BelongsTo
    {
        return $this->belongsTo(ScreenType::class);
    }

    public function screen_price(): hasMany
    {
        return $this->hasMany(ScreenPrice::class);
    }



    public function translations(): hasOne
    {
        return $this->hasOne(PlanTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()->select('plan_id', 'title')->where('locale', app()->getLocale());
    }

    public function title(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->title ?? '',
        );
    }
}
