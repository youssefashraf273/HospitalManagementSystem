<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'diagnosis',
        'symptoms',
        'prescribed_medication',
        'medical_history',
    ];

    public function labtest(){
        return $this->hasMany(LabTest::class);
    }
}
