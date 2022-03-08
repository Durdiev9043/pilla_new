<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hudud extends Model
{
    use Notifiable;
    protected $fillable=[
        'name','sektor','region_id'
    ];

    public function region(){
        return $this->belongsTo(Region::class);
    }

}
