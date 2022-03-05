<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    use Notifiable;
    protected $fillable=['fullname','region_id','village_id','kontur','jshir','ekin_turi','maydon','toladi','passport','inn','algan_qutisi','olgan_gr','topshirish_rejasi','topshirgani'];

    public function village(){
        return $this->belongsTo(Village::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
