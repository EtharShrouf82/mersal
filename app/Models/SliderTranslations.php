<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderTranslations extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'secondary_description', 'discount', 'button_title', 'locale'];
}
