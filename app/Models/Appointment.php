<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['registrant_id', 'vaccine_center_id', 'scheduled_date'];

    public function vaccine_center()
    {
        return $this->belongsTo(VaccineCenter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute()
    {
        return $this->bindStatus($this->status);
    }

    public function bindStatus($status)
    {
        switch ($status) {
            case 0:
                return 'scheduled';
            case 1:
                return 'vaccinated';
            case 2:
                return 'cancelled';
            default:
                return '';
        }
    }

}
