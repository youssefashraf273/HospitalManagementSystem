<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_number',
        'card_expire_date',
        'transaction_amount',
        'user_id',
        'appointment_id',
    ];

    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }
}
