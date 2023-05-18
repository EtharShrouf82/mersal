<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceInfo extends Model
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
        return ($val !== null) ? ('/images/services/'.$val) : '/admin/img/logo.png';
    }

    public function translations(): hasOne
    {
        return $this->hasOne(ServiceInfoTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()
            ->select('service_info_id', 'title', 'description','box_title','box_description')
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

    public function boxTitle(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->box_title ?? '',
        );
    }

    public function boxDescription(): Attribute
    {
        return new Attribute(
            get: fn () => $this->defaultTranslation->box_description ?? '',
        );
    }
}
