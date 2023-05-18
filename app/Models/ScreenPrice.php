<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ScreenPrice extends Model
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

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function translations(): hasOne
    {
        return $this->hasOne(ScreenPriceTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()->select('screen_price_id', 'title')->where('locale', app()->getLocale());
    }

    public function title(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->title ?? '',
        );
    }

    public function getPriceAfterDiscount(): string
    {
        if($this->discount){
            return number_format($this->price - ($this->price * $this->discount / 100));
        }else{
            return $this->price;
        }
    }
}
