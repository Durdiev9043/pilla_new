<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FarmStaff extends Model
{
    use Notifiable;
    protected $fillable=['fullname','farm_id','kontur','jshir','ekin_turi','maydon','toladi','passport','inn','algan_qutisi','olgan_gr','topshirish_rejasi','topshirgani','avans','resurs','subsedya'];

    public function farm(){
        return $this->belongsTo(Farm::class);
}
}
