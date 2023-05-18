<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanismTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['mechanism_id', 'title', 'locale', 'description'];
}
