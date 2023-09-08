<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    protected $fillable=[
        'fullname',
        'village_id',
        'region_id',
        'passport',
        'phone',
        'inn',
        'jshir',
        'kontur',
        'maydon',
        'hudud_id',

//        'toladi',
//        'ekin_turi',
//        'algan_qutisi',
//        'olgan_gr',
//        'topshirish_rejasi',
//        'topshirgani',
//        'yil_boshiga',
//        'bugdoy',
//        'beda',
//        'sabzovod',
//        'poliz',
//        'kungaboqar',
//        'kartoshka',
//        'piyoz',
//        'sarimsoq_piyoz',
//        'ozuqa',
//        'sholi',
//        'ozuqa',
//        'izoh',
//        'avans',
//        'resurs',
//        'subsedya'
    ];
    use Notifiable;

    public function village(){
        return $this->belongsTo(Village::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
