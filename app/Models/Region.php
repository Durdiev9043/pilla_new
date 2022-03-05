<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Region extends Model
{
    use Notifiable;
    protected $fillable=['name','klaster_id'];

    public function klaster(){
        return $this->belongsTo(Klaster::class);
    }
}
