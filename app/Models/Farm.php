<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Farm extends Model
{
    use Notifiable;
    protected $fillable=['name','region_id','village_id','algan_qutisi','olgan_gr','topshirish_rejasi','topshirgani'];

    public function village(){
        return $this->belongsTo(Village::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
