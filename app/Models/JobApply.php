<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function status()
    {
        if($this->is_replayed == null){
            $by = '<span class="text-danger">جديد</span>';
        }else{
            $by = '<span class="text-success">تم الرد بواسطة '.\Auth::user()->name.'</span>';
        }
        return $by;
    }

    public function gender()
    {
        if($this->gender == 1){
            $gen='ذكر';
        }else{
            $gen='أنثى';
        }
        return $gen;
    }
}
