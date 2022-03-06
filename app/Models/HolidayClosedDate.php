<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayClosedDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'startWeek',
        'endWeek'
    ];
    protected $attributes = [
        'isVisible' => true
    ];

    public $timestamps = false;
}
