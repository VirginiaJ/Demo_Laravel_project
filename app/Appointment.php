<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
}
