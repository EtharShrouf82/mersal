<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WhyDigital extends Model
{
    use HasFactory;

    protected $with = [
        'defaultTranslation',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function translations(): HasOne
    {
        return $this->hasOne(WhyDigitalTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        // Making sure that we always retrieve current locale information
        return $this->translations()
            ->select('why_digital_id', 'title', 'description')
            ->where('locale', app()->getLocale());
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
}
