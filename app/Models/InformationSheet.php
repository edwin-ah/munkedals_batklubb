<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pdfName',
        'filePath'
    ];
}
