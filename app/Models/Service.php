<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $with = [
        'defaultTranslation', // Preloading current locale translation at all times
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getIconAttribute($val)
    {
        return ($val !== null) ? ('/images/services/'.$val) : '/admin/img/logo.png';
    }

    public function translations(): hasOne
    {
        return $this->hasOne(ServiceTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()->select('service_id', 'title', 'description')->where('locale', app()->getLocale());
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

    public function follow()
    {
        if ($this->follow == 1) {
            $fl = '<span class="text-success">خدمات أنظمة الحماية والكاميرات</span>';
        }elseif($this->follow == 3){
            $fl = '<span class="text-primary">خدمات عامة</span>';
        } else {
            $fl = '<span class="text-danger">خدمات التصميم والإعلانات</span>';
        }

        return $fl;
    }

    public function info()
    {
        return $this->hasMany(ServiceInfo::class);
    }

    public function work_sample()
    {
        return $this->hasMany(WorkSample::class);
    }
}
