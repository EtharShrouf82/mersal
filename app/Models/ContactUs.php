<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use SoftDeletes;
    protected $table = 'contact_us';
    protected $fillable = [
        'name','contact_cat_id', 'tel', 'message', 'status', 'admins_id', 'ip'
    ];

    public function getStatus(){
        return $this->status == 1 ? '<span class="text-success">تم الرد</span>' : '<span class="text-danger">جديد</span>';
    }

}
