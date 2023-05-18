<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id', 'title', 'locale', 'description'];
}
