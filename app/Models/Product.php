<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $with = [
        'defaultTranslation',
    ];

    protected $fillable = ['brand_id', 'status', 'price', 'sku', 'is_featured', 'img', 'hover_img', 'user_id'];

    public function getImgAttribute($val)
    {
        return '/images/products/'.$val;
    }

    public function getHoverImgAttribute($val)
    {
        return '/images/products/'.$val;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cats(): belongsToMany
    {
        return $this->belongsToMany(Cat::class);
    }

    public function translations(): HasOne
    {
        return $this->hasOne(ProductTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()
            ->select('product_id', 'title', 'description')
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

    public function images(): hasMany
    {
        return $this->HasMany(ProductImg::class);
    }
}
