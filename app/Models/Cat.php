<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
    use SoftDeletes;

    protected $with = ['defaultTranslation'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getSecondaryImgAttribute($val)
    {
        return ($val !== null) ? ('/images/cats/'.$val) : '/admin/img/logo.png';
    }

    public function getImgAttribute($val)
    {
        return ($val !== null) ? ('/images/cats/'.$val) : '/admin/img/logo.png';
    }

    public function products(): belongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function translations(): hasOne
    {
        return $this->hasOne(CatTranslation::class);
    }

    public function titleTranslation(): HasOne
    {
        return $this->translations()->select('cat_id', 'title')->where('locale', app()->getLocale());
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()->select('cat_id', 'title', 'description')->where('locale', app()->getLocale());
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

    public function childs()
    {
        return $this->hasMany(self::class, 'parent', 'id');
    }
}
