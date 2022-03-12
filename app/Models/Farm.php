<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Farm extends Model
{
    use Notifiable;
    protected $fillable=['name','region_id','inn','resurs','tut','ekin_turi','h2020','h23202','maydon','tut','phone','yil_boshiga','avans','resurs','subsedya','izoh','toladi','village_id','algan_qutisi','olgan_gr','topshirish_rejasi','topshirgani'];

    public function village(){
        return $this->belongsTo(Village::class);
    }
    public function hudud(){
        return $this->belongsTo(Hudud::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
