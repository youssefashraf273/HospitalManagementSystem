<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_name',
        'test_description',
        'test_category',
        'test_reference_range',
        'test_value',
        'advices',
    ];
}
