<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['registrant_id', 'vaccine_center_id', 'scheduled_date'];

    public function vaccineCenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
