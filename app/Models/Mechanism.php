<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mechanism extends Model
{
    use HasFactory;

    protected $with = ['titleTranslation'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function translations(): hasOne
    {
        return $this->hasOne(MechanismTranslation::class);
    }

    public function titleTranslation(): HasOne
    {
        return $this->translations()->select('mechanism_id', 'title')->where('locale', app()->getLocale());
    }

    public function title(): Attribute
    {
        return new Attribute(
            get: fn () => $this->titleTranslation->title ?? '',
        );
    }
}
