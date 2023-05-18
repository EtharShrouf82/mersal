<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WorkSample extends Model
{
    use HasFactory;

    protected $with = [
        'defaultTranslation',
    ];

    public function getImgAttribute($val)
    {
        return '/images/works/'.$val;
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function translations(): HasOne
    {
        return $this->hasOne(WorkSampleTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()
            ->select('work_sample_id', 'title')
            ->where('locale', app()->getLocale());
    }

    public function title(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->title ?? '',
        );
    }

    public function service() : BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
