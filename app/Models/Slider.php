<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Slider extends Model
{
    use HasFactory;

    protected $with = [
        'defaultTranslation', // Preloading current locale translation at all times
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getImgAttribute($val)
    {
        return ($val !== null) ? ('/images/slider/'.$val) : '/admin/img/logo.png';
    }

    public function translations(): HasOne
    {
        return $this->hasOne(SliderTranslations::class);
    }

    public function defaultTranslation(): HasOne
    {
        // Making sure that we always retrieve current locale information
        return $this->translations()->select('slider_id', 'title', 'description', 'button_title')->where('locale', app()->getLocale());
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

    public function buttonTitle(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->button_title ?? '',
        );
    }
}
