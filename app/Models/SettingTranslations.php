<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTranslations extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name', 'site_description', 'site_keyword', 'site_closed_msg', 'facebook', 'twitter', 'linkedin', 'instagram',
        'youtube', 'telegram', 'snapchat', 'tiktok', 'whatsapp', 'tel', 'email', 'about', 'locale', 'address', 'video', 'event_message',
        'privacy_title', 'privacy_body', 'terms_title', 'terms_body',
    ];
}
