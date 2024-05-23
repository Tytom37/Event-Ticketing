<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fullname',
        'contact_number',
        'email',
        'schedule_id'
    ];

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }
}
