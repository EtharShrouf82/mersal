<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreenTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['screen_id', 'title', 'description', 'locale'];
}
