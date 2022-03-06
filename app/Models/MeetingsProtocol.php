<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingsProtocol extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'year',
        'date',
        'filePath',
        'pdfName'
    ];

    public $timestamps = false;
}
