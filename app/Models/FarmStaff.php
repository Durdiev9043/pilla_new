<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FarmStaff extends Model
{
    use Notifiable;
    protected $fillable=['fullname','farm_id','village_id','hudud_id','region_id','jshir','yakka_tut','toladi','passport','inn','algan_qutisi','olgan_gr','topshirish_rejasi','topshirgani'];

    public function farm(){
        return $this->belongsTo(Farm::class);
}
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
