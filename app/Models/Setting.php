<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Setting extends Model
{
    use HasFactory;

    public function translations(): HasOne
    {
        return $this->hasOne(SettingTranslations::class);
    }

    public $timestamps = false;
}
